<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\Type;

/**
 * @ApiResource()
 * @ORM\Table(name="company")
 * @ORM\Entity()
 */
class Company
{
  /**
   * @ORM\Id
   * @ORM\GeneratedValue
   * @ORM\Column(type="integer")
   */
  private int $id;

  /**
   * @var string
   * @ORM\Column(name="name", type="string")
   * @Type("string")
   */
  private string $name;

  /**
   * @var string
   * @ORM\Column(name="logo", type="string")
   * @Type("string")
   */
  private string $logo;

  /**
   * @var string
   * @ORM\Column(name="creation_year", type="string")
   * @Type("string")
   */
  private string $creationYear;

  /**
   * @var string
   * @ORM\Column(name="website_link", type="string")
   * @Type("string")
   */
  private string $websiteLink;

  /**
   * @var string
   * @ORM\Column(name="contact_email", type="string")
   * @Type("string")
   */
  private string $contactEmail;

  /**
   * @var string
   * @ORM\Column(name="description", type="string")
   * @Type("string")
   */
  private string $description;

  /**
   * @var string
   * @ORM\Column(name="company_values", type="string")
   * @Type("string")
   */
  private string $companyValues;

  /**
   * @var integer
   * @ORM\Column(name="headcount", type="integer")
   */
  private int $headcount;

  /**
   * @var string
   * @ORM\Column(name="business_area", type="string")
   */
  private string $businessArea;

  /**
   * @var DateTime
   * @ORM\Column(name="created_at", type="datetime", nullable=true)
   * @Type("DateTime")
   */
  private DateTime $createdAt;

  /**
   * @var mixed
   * @ORM\Column(name="updated_at", type="datetime", nullable=true)
   */
  private $updatedAt;

  /**
   * @var mixed
   * @ORM\Column(name="last_active", type="datetime", nullable=true)
   * @Type("DateTime")
   */
  private $lastActive;

  /**
   * @ORM\OneToMany(targetEntity="App\Entity\SoughtRegion", mappedBy="company")
   */
  private $soughtRegions;


  public function __construct()
  {
    $this->soughtRegions = new ArrayCollection();
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
  public function getName(): string
  {
    return $this->name;
  }

  /**
   * @param string $name
   */
  public function setName(string $name): void
  {
    $this->name = $name;
  }

  /**
   * @return string
   */
  public function getLogo(): string
  {
    return $this->logo;
  }

  /**
   * @param string $logo
   */
  public function setLogo(string $logo): void
  {
    $this->logo = $logo;
  }

  /**
   * @return string
   */
  public function getWebsiteLink(): string
  {
    return $this->websiteLink;
  }

  /**
   * @param string $websiteLink
   */
  public function setWebsiteLink(string $websiteLink): void
  {
    $this->websiteLink = $websiteLink;
  }

  /**
   * @return string
   */
  public function getContactEmail(): string
  {
    return $this->contactEmail;
  }

  /**
   * @param string $contactEmail
   */
  public function setContactEmail(string $contactEmail): void
  {
    $this->contactEmail = $contactEmail;
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
   * @return string
   */
  public function getCompanyValues(): string
  {
    return $this->companyValues;
  }

  /**
   * @param string $companyValues
   */
  public function setCompanyValues(string $companyValues): void
  {
    $this->companyValues = $companyValues;
  }

  /**
   * @return int
   */
  public function getHeadcount(): int
  {
    return $this->headcount;
  }

  /**
   * @param int $headcount
   */
  public function setHeadcount(int $headcount): void
  {
    $this->headcount = $headcount;
  }

  /**
   * @return string
   */
  public function getBusinessArea(): string
  {
    return $this->businessArea;
  }

  /**
   * @param string $businessArea
   */
  public function setBusinessArea(string $businessArea): void
  {
    $this->businessArea = $businessArea;
  }

  /**
   * @return DateTime
   */
  public function getCreatedAt(): DateTime
  {
    return $this->createdAt;
  }

  /**
   * @param DateTime $createdAt
   */
  public function setCreatedAt(DateTime $createdAt): void
  {
    $this->createdAt = $createdAt;
  }

  /**
   * @return mixed
   */
  public function getUpdatedAt()
  {
    return $this->updatedAt;
  }

  /**
   * @param mixed $updatedAt
   */
  public function setUpdatedAt($updatedAt): void
  {
    $this->updatedAt = $updatedAt;
  }

  /**
   * @return mixed
   */
  public function getLastActive()
  {
    return $this->lastActive;
  }

  /**
   * @param mixed $lastActive
   */
  public function setLastActive($lastActive): void
  {
    $this->lastActive = $lastActive;
  }

  /**
   * @return mixed
   */
  public function getSoughtRegions()
  {
    return $this->soughtRegions;
  }

  /**
   * @param mixed $soughtRegions
   */
  public function setSoughtRegions($soughtRegions): void
  {
    $this->soughtRegions = $soughtRegions;
  }

  /**
   * @return string
   */
  public function getCreationYear(): string
  {
    return $this->creationYear;
  }

  /**
   * @param string $creationYear
   */
  public function setCreationYear(string $creationYear): void
  {
    $this->creationYear = $creationYear;
  }
}