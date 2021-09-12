<?php

namespace App\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\Type;

/**
 * @ORM\Table(name="formation")
 * @ORM\Entity()
 */
class Formation
{
  /**
   * @ORM\Id
   * @ORM\GeneratedValue
   * @ORM\Column(type="integer")
   */
  private int $id;

  /**
   * @var string
   * @ORM\Column(name="school_name", type="string")
   * @Type("string")
   */
  private string $schoolName;

  /**
   * @var string
   * @ORM\Column(name="formation_title", type="string")
   * @Type("string")
   */
  private string $formationTitle;

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
   * One applicant can have one or many formations
   * @ORM\ManyToOne(targetEntity="App\Entity\Applicant", inversedBy="formations")
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
  public function getSchoolName(): string
  {
    return $this->schoolName;
  }

  /**
   * @param string $schoolName
   */
  public function setSchoolName(string $schoolName): void
  {
    $this->schoolName = $schoolName;
  }

  /**
   * @return string
   */
  public function getFormationTitle(): string
  {
    return $this->formationTitle;
  }

  /**
   * @param string $formationTitle
   */
  public function setFormationTitle(string $formationTitle): void
  {
    $this->formationTitle = $formationTitle;
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
}