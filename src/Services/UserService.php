<?php

namespace App\Services;

use App\Entity\Applicant;
use App\Entity\Formation;
use App\Entity\ProfessionalExperience;
use App\Entity\Skill;
use App\Entity\SoughtRegion;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;

class UserService
{
  private EntityManagerInterface $em;

  /**
   * @param EntityManagerInterface $em
   */
  public function __construct(EntityManagerInterface $em)
  {
    $this->em = $em;
  }

  /**
   * @param User $user
   */
  public function getUserFormations(User $user): array
  {
    $formations = [];
    foreach($this->em->getRepository(Formation::class)->findBy(['applicant' => $user->getApplicant()]) as $formation){
      if($formation instanceof Formation){
        $formations[] = [
          'schoolName' => $formation->getSchoolName(),
          'formationTitle' => $formation->getFormationTitle(),
          'startDate' => $formation->getStartDate()->format('m-d-Y'),
          'endDate' => $formation->getEndDate()->format('m-d-Y'),
          'location' => $formation->getLocation(),
          'country' => $formation->getCountry(),
        ];
      }
    }
    return $formations;
  }

  /**
   * @param User $user
   */
  public function getUserSkills(User $user): array
  {
    $skills = [];
    foreach($this->em->getRepository(Skill::class)->findBy(['applicant' => $user->getApplicant()]) as $skill){
      if($skill instanceof Skill){
        $skills[] = [
          'name' => $skill->getName(),
          'level' => $skill->getLevel(),
          'category' => $skill->getCategory(),
          'subCategory' => $skill->getSubCategory(),
        ];
      }
    }
    return $skills;
  }

  /**
   * @param User $user
   */
  public function getUserProfessionalExperiences(User $user): array
  {
    $proExperiences = [];
    foreach($this->em->getRepository(ProfessionalExperience::class)->findBy(['applicant' => $user->getApplicant()]) as $proExperience){
      if($proExperience instanceof ProfessionalExperience){
        $proExperiences[] = [
          'company' => $proExperience->getCompany(),
          'title' => $proExperience->getTitle(),
          'description' => $proExperience->getDescription(),
          'startDate' => $proExperience->getStartDate()->format('m-d-Y'),
          'endDate' => $proExperience->getEndDate()->format('m-d-Y'),
          'location' => $proExperience->getLocation(),
          'country' => $proExperience->getCountry(),
          'contractType' => $proExperience->getContractType()
        ];
      }
    }
    return $proExperiences;
  }

  /**
   * @param User $user
   */
  public function getUserApplicant(User $user): array
  {
    $userApplicant = $user->getApplicant();
    if($userApplicant instanceof Applicant){
      $userApplicant = [
        'firstname' => $userApplicant->getFirstname(),
        'lastname' => $userApplicant->getLastname(),
        'lookingFor' => $userApplicant->isLookingFor(),
        'email' => $userApplicant->getEmail(),
        'birthday' => $userApplicant->getBirthday()->format('d-m-Y'),
        'educationLevel' => $userApplicant->getEducationLevel(),
        'linkedin' => $userApplicant->getLinkedin(),
        'profilPicture' => $userApplicant->getProfilPicture(),
      ];
    }
    return $userApplicant;
  }

  /**
   * @param User $user
   */
  public function getUserSoughtRegions(User $user): array
  {
    $soughtRegions = [];
    foreach($this->em->getRepository(SoughtRegion::class)->findBy(['applicant' => $user->getApplicant()]) as $soughtRegion){
      if($soughtRegion instanceof SoughtRegion){
        $soughtRegions[] = [
          'region' => $soughtRegion->getRegion(),
          'country' => $soughtRegion->getCountry(),
        ];
      }
    }
    return $soughtRegions;
  }
}