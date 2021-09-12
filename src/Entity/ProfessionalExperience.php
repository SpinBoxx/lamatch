<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\Type;

/**
 * @ApiResource()
 * @ORM\Table(name="professional_experience")
 * @ORM\Entity()
 */
class ProfessionalExperience
{
  /**
   * @ORM\Id
   * @ORM\GeneratedValue
   * @ORM\Column(type="integer")
   */
  private int $id;

  /**
   * @var string
   * @ORM\Column(name="company", type="string")
   * @Type("string")
   */
  private string $company;

  /**
   * @var string
   * @ORM\Column(name="contract_type", type="string")
   * @Type("string")
   */
  private string $contractType;

  /**
   * @var string
   * @ORM\Column(name="title", type="string")
   * @Type("string")
   */
  private string $title;

  /**
   * @var string
   * @ORM\Column(name="description", type="string")
   * @Type("string")
   */
  private string $description;

  /**
   * @var DateTime
   * @ORM\Column(name="start_date", type="datetime")
   * @Type("DateTime")
   */
  private DateTime $startDate;

  /**
   * @var DateTime
   * @ORM\Column(name="end_date", type="datetime", nullable=true)
   * @Type("DateTime")
   */
  private DateTime $endDate;

  /**
   * @var string
   * @ORM\Column(name="location", type="string")
   * @Type("string")
   */
  private string $location;

  /**
   * @var string
   * @ORM\Column(name="country", type="string")
   * @Type("string")
   */
  private string $country;

  /**
   * One applicant can have one or many professional experiences
   * @ORM\ManyToOne(targetEntity="App\Entity\Applicant", inversedBy="professionalExperiences")
   */
  private $applicant;

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
  public function getCompany(): string
  {
    return $this->company;
  }

  /**
   * @param string $company
   */
  public function setCompany(string $company): void
  {
    $this->company = $company;
  }

  /**
   * @return string
   */
  public function getDescription(): string
  {
    return $this->description;
  }

  /**
   * @param string $description
   */
  public function setDescription(string $description): void
  {
    $this->description = $description;
  }

  /**
   * @return DateTime
   */
  public function getStartDate(): DateTime
  {
    return $this->startDate;
  }

  /**
   * @param DateTime $startDate
   */
  public function setStartDate(DateTime $startDate): void
  {
    $this->startDate = $startDate;
  }

  /**
   * @return DateTime
   */
  public function getEndDate(): DateTime
  {
    return $this->endDate;
  }

  /**
   * @param DateTime $endDate
   */
  public function setEndDate(DateTime $endDate): void
  {
    $this->endDate = $endDate;
  }

  /**
   * @return string
   */
  public function getLocation(): string
  {
    return $this->location;
  }

  /**
   * @param string $location
   */
  public function setLocation(string $location): void
  {
    $this->location = $location;
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
   * @return string
   */
  public function getContractType(): string
  {
    return $this->contractType;
  }

  /**
   * @param string $contractType
   */
  public function setContractType(string $contractType): void
  {
    $this->contractType = $contractType;
  }

  /**
   * @return string
   */
  public function getTitle(): string
  {
    return $this->title;
  }

  /**
   * @param string $title
   */
  public function setTitle(string $title): void
  {
    $this->title = $title;
  }
}