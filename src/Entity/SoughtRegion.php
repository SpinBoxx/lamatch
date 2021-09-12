<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\Type;

/**
 * @ORM\Table(name="sought_region")
 * @ORM\Entity(repositoryClass="App\Repository\SoughtRegionRepository")
 */
class SoughtRegion
{
  /**
   * @ORM\Id
   * @ORM\GeneratedValue
   * @ORM\Column(type="integer")
   */
  private int $id;

  /**
   * @var string
   * @ORM\Column(name="region", type="string")
   * @Type("string")
   */
  private string $region;

  /**
   * @var string
   * @ORM\Column(name="country", type="string")
   * @Type("string")
   */
  private string $country;

  /**
   * One applicant can have one or many sought regions
   * @ORM\ManyToOne(targetEntity="App\Entity\Applicant", inversedBy="soughtRegions")
   */
  private $applicant;

  /**
   * One applicant can have one or many skills
   * @ORM\ManyToOne(targetEntity="App\Entity\Company", inversedBy="soughtRegions")
   */
  private $company;

  public function __construct()
  {

  }

  /**
   * @return int
   */
  public function getId(): int
  {
    return $this->id;
  }

  /**
   * @param int $id
   */
  public function setId(int $id): void
  {
    $this->id = $id;
  }

  /**
   * @return string
   */
  public function getRegion(): string
  {
    return $this->region;
  }

  /**
   * @param string $region
   */
  public function setRegion(string $region): void
  {
    $this->region = $region;
  }

  /**
   * @return string
   */
  public function getCountry(): string
  {
    return $this->country;
  }

  /**
   * @param string $country
   */
  public function setCountry(string $country): void
  {
    $this->country = $country;
  }

  /**
   * @return mixed
   */
  public function getApplicant()
  {
    return $this->applicant;
  }

  /**
   * @param mixed $applicant
   */
  public function setApplicant($applicant): void
  {
    $this->applicant = $applicant;
  }

  /**
   * @return mixed
   */
  public function getCompany()
  {
    return $this->company;
  }

  /**
   * @param mixed $company
   */
  public function setCompany($company): void
  {
    $this->company = $company;
  }
}