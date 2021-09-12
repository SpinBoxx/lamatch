<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\Type;

/**
 * @ApiResource()
 * @ORM\Table(name="matching")
 * @ORM\Entity()
 */
class Matching
{
  /**
   * @ORM\Id
   * @ORM\GeneratedValue
   * @ORM\Column(type="integer")
   */
  private int $id;

  /**
   * @var
   * @ORM\OneToOne(targetEntity="App\Entity\Company")
   * @ORM\JoinColumn(name="company_id", referencedColumnName="id")
   * @Type("App\Entity\Company")
   */
  private $company;

  /**
   * @var
   * @ORM\OneToOne(targetEntity="App\Entity\Applicant")
   * @ORM\JoinColumn(name="applicant_id", referencedColumnName="id")
   * @Type("App\Entity\Applicant")
   */
  private $applicant;

  /**
   * @var DateTime
   * @ORM\Column(name="matching_date", type="datetime")
   * @Type("DateTime")
   */
  private DateTime $matchingDate;

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
   * @return DateTime
   */
  public function getMatchingDate(): DateTime
  {
    return $this->matchingDate;
  }

  /**
   * @param DateTime $matchingDate
   */
  public function setMatchingDate(DateTime $matchingDate): void
  {
    $this->matchingDate = $matchingDate;
  }
}