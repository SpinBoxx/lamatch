<?php

namespace App\Services;

use App\Entity\Applicant;
use App\Entity\Company;
use App\Entity\Skill;
use App\Entity\SoughtRegion;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;

class MatchingService
{
  private EntityManagerInterface $em;
  private int $totalPercentage;
  private int $percentageSoughtRegion;
  private int $percentageBusinessArea;
  private int $coefficientOfSoughtRegion;
  private int $coefficientOfBusinessArea;
  private int $nbOfMatchingParameters;

  /**
   * @param EntityManagerInterface $em
   */
  public function __construct(EntityManagerInterface $em)
  {
    $this->em = $em;
    // SUM OF THE COEFFICIENT
    $this->nbOfMatchingParameters = 4;
    $this->percentageSoughtRegion = 100;
    $this->percentageBusinessArea = 100;
    $this->coefficientOfSoughtRegion = 3;
    $this->coefficientOfBusinessArea = 1;
    $this->totalPercentage = 0;
  }

  /**
   * @param User $user
   */
  public function getMatchingCompanies(User $user): array
  {
    $companies = [];
    // I find all the Companies to do the algorithm
    foreach($this->em->getRepository(Company::class)->findAll() as $company){
      if($company instanceof Company){
        $userApplicant = $user->getApplicant();
        if($userApplicant instanceof Applicant){
          $this->soughtRegionParameter($userApplicant, $company);
          $this->businessAreaParameter($userApplicant, $company);
        }
      }
      $this->totalPercentage =
        (($this->percentageSoughtRegion * $this->coefficientOfSoughtRegion) +
          ($this->percentageBusinessArea * $this->coefficientOfBusinessArea)) / $this->nbOfMatchingParameters;
      $companies[] = [
        'matchingPercentage' => $this->totalPercentage,
        'name' => $company->getName(),
        'logo' => $company->getLogo(),
        'websiteLink' => $company->getWebsiteLink(),
        'contactEmail' => $company->getContactEmail(),
        'description' => $company->getDescription(),
        'companyValues' => $company->getCompanyValues(),
        'businessArea' => $company->getBusinessArea(),
        'creationYear' => $company->getCreationYear(),
        'headcount' => $company->getHeadcount(),
      ];
      $this->totalPercentage = 0;
      $this->percentageSoughtRegion = 100;
      $this->percentageBusinessArea = 100;
    }

    function cmp($a, $b)
    {
      if ($a['matchingPercentage'] == $b['matchingPercentage']) {
        return 0;
      }
      return ($a['matchingPercentage'] > $b['matchingPercentage']) ? -1 : 1;
    }
    // SORT THE COMPANIES ARRAY BY THE MATCHINGPERCENTAGE
    usort($companies, "App\Services\cmp");
    return $companies;
  }

  /**
   * @param Applicant $applicant
   * @param Company $company
   */
  public function soughtRegionParameter(Applicant $applicant, Company $company){
    // This array need to have unique values
    $userSoughtRegions = $this->em->getRepository(SoughtRegion::class)->groupBySoughtRegionByApplicant($applicant);
    $tabSoughtRegionByCompany = [];
    // I do an array to truncate datas and keep only the name of the region
    // This array need to have unique values
    foreach ($company->getSoughtRegions() as $region){
      $tabSoughtRegionByCompany[] = [
        $region->getRegion(),
      ];
    }
    // THE ALGO TO SET A PERCENTAGE OF MATCHING REGIONS BETWEEN User AND Company
    $nbOfSoughtRegions = sizeof($userSoughtRegions);
    // For the sought regions by user i check if the company search in this regions also
    foreach ($userSoughtRegions as $userSoughtRegion){
      if($userSoughtRegion instanceof SoughtRegion){
        // IF THE USER REGION IS NOT MATCHING WITH THE COMPANY, I SUBTRACT THE percentageSoughtRegion
        if(!in_array([0 => $userSoughtRegion->getRegion()], $tabSoughtRegionByCompany)){
          $this->percentageSoughtRegion = ((($nbOfSoughtRegions - 1) * $this->percentageSoughtRegion) / ($nbOfSoughtRegions));
          $nbOfSoughtRegions--;
        }
      }
      // I DELETE THE CURRENT REGION IN THE SOUGHT REGION COMPANY
      if(array_search([0 => $userSoughtRegion->getRegion()], $tabSoughtRegionByCompany) !== false){
        unset($tabSoughtRegionByCompany[array_search([0 => $userSoughtRegion->getRegion()], $tabSoughtRegionByCompany)]);
      }
    }
  }

  /**
   * @param Applicant $applicant
   * @param Company $company
   */
  public function businessAreaParameter(Applicant $applicant, Company $company){
    // This array need to have unique values
    $userSkills = $this->em->getRepository(Skill::class)->groupBySkillsByApplicant($applicant);
    // THE ALGO TO SET A PERCENTAGE OF MATCHING SKILLS CATEGORY BETWEEN User AND Company
    $nbOfSkills = sizeof($userSkills);
    // For the skills by user i check if the company have the same business area
    foreach ($userSkills as $userSkill){
      if($userSkill instanceof Skill){
        if(!str_contains($company->getBusinessArea(), $userSkill->getCategory())){
          $this->percentageBusinessArea = ((($nbOfSkills - 1) * $this->percentageBusinessArea) / ($nbOfSkills));
          $nbOfSkills--;
        }
      }
    }
  }
}