<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\Type;

/**
 * @ApiResource()
 * @ORM\Table(name="applicant")
 * @ORM\Entity()
 */
class Applicant
{
  /**
   * @ORM\Id
   * @ORM\GeneratedValue
   * @ORM\Column(type="integer")
   */
  private int $id;

  /**
   * @var string
   * @ORM\Column(name="firstname", type="string")
   * @Type("string")
   */
  private string $firstname;

  /**
   * @var string
   * @ORM\Column(name="lastname", type="string")
   * @Type("string")
   */
  private string $lastname;

  /**
   * @var boolean
   * @ORM\Column(name="looking_for", type="boolean")
   * @Type("boolean")
   */
  private bool $lookingFor;

  /**
   * @var string
   * @ORM\Column(name="email", type="string")
   * @Type("string")
   */
  private string $email;

  /**
   * @var string
   * @ORM\Column(name="profil_picture", type="string")
   * @Type("string")
   */
  private string $profilPicture;

  /**
   * @var DateTime
   * @ORM\Column(name="birthday", type="datetime", nullable=true)
   * @Type("DateTime")
   */
  private DateTime $birthday;

  /**
   * @var string
   * @ORM\Column(name="education_level", type="string")
   * @Type("string")
   */
  private string $educationLevel;

  /**
   * @var
   * @ORM\OneToMany(targetEntity="App\Entity\Formation", mappedBy="applicant")
   */
  private $formations;

  /**
   * @var
   * @ORM\OneToMany(targetEntity="App\Entity\ProfessionalExperience", mappedBy="applicant")
   */
  private $professionalExperiences;

  /**
   * @ORM\OneToMany(targetEntity="App\Entity\Skill", mappedBy="applicant")
   */
  private $skills;

  /**
   * @var string
   * @ORM\Column(name="linkedin", type="string")
   * @Type("string")
   */
  private string $linkedin;

  /**
   * @ORM\OneToMany(targetEntity="App\Entity\SoughtRegion", mappedBy="applicant")
   */
  private $soughtRegions;

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
   */
  private $lastActive;

  public function __construct()
  {
    $this->skills = new ArrayCollection();
    $this->formations = new ArrayCollection();
    $this->professionalExperiences = new ArrayCollection();
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
  public function getFirstname(): string
  {
    return $this->firstname;
  }

  /**
   * @param string $firstname
   */
  public function setFirstname(string $firstname): void
  {
    $this->firstname = $firstname;
  }

  /**
   * @return string
   */
  public function getLastname(): string
  {
    return $this->lastname;
  }

  /**
   * @param string $lastname
   */
  public function setLastname(string $lastname): void
  {
    $this->lastname = $lastname;
  }

  /**
   * @return bool
   */
  public function isLookingFor(): bool
  {
    return $this->lookingFor;
  }

  /**
   * @param bool $lookingFor
   */
  public function setLookingFor(bool $lookingFor): void
  {
    $this->lookingFor = $lookingFor;
  }

  /**
   * @return string
   */
  public function getEmail(): string
  {
    return $this->email;
  }

  /**
   * @param string $email
   */
  public function setEmail(string $email): void
  {
    $this->email = $email;
  }

  /**
   * @return DateTime
   */
  public function getBirthday(): DateTime
  {
    return $this->birthday;
  }

  /**
   * @param DateTime $birthday
   */
  public function setBirthday(DateTime $birthday): void
  {
    $this->birthday = $birthday;
  }

  /**
   * @return string
   */
  public function getEducationLevel(): string
  {
    return $this->educationLevel;
  }

  /**
   * @param string $educationLevel
   */
  public function setEducationLevel(string $educationLevel): void
  {
    $this->educationLevel = $educationLevel;
  }

  /**
   * @return mixed
   */
  public function getFormations()
  {
    return $this->formations;
  }

  /**
   * @param mixed $formations
   */
  public function setFormations($formations): void
  {
    $this->formations = $formations;
  }

  /**
   * @return mixed
   */
  public function getProfessionalExperiences()
  {
    return $this->professionalExperiences;
  }

  /**
   * @param mixed $professionalExperiences
   */
  public function setProfessionalExperiences($professionalExperiences): void
  {
    $this->professionalExperiences = $professionalExperiences;
  }

  /**
   * @return mixed
   */
  public function getSkills()
  {
    return $this->skills;
  }

  /**
   * @param mixed $skills
   */
  public function setSkills($skills): void
  {
    $this->skills = $skills;
  }

  /**
   * @return string
   */
  public function getLinkedin(): string
  {
    return $this->linkedin;
  }

  /**
   * @param string $linkedin
   */
  public function setLinkedin(string $linkedin): void
  {
    $this->linkedin = $linkedin;
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
   * @param DateTime $updatedAt
   */
  public function setUpdatedAt(DateTime $updatedAt): void
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
   * @param DateTime $lastActive
   */
  public function setLastActive(DateTime $lastActive): void
  {
    $this->lastActive = $lastActive;
  }

  /**
   * @return string
   */
  public function getProfilPicture(): string
  {
    return $this->profilPicture;
  }

  /**
   * @param string $profilPicture
   */
  public function setProfilPicture(string $profilPicture): void
  {
    $this->profilPicture = $profilPicture;
  }
}