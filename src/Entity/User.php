<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\UserRepository;
use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints\Type;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @ORM\Table(name="user")
 */
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
  /**
   * @ORM\Id
   * @ORM\GeneratedValue
   * @ORM\Column(type="integer")
   */
  private int $id;

  /**
   * @var string
   * @ORM\Column(name="username", type="string", length=180, unique=true)
   * @Type("string")
   */
  private string $username;

  /**
   * @var string
   * @ORM\Column(name="email", type="string", length=180, unique=true)
   * @Type("string")
   */
  private string $email;

  /**
   * @ORM\Column(type="json")
   */
  private array $roles = [];

  /**
   * @var string The hashed password
   * @ORM\Column(name="password", type="string")
   * @Type("string")
   */
  private string $password;

  /**
   * @var
   * @ORM\OneToOne(targetEntity="App\Entity\Applicant")
   * @ORM\JoinColumn(name="applicant_id", referencedColumnName="id", nullable=true)
   * @Type("App\Entity\Applicant")
   */
  private $applicant;

  /**
   * @var
   * @ORM\OneToOne(targetEntity="App\Entity\Company")
   * @ORM\JoinColumn(name="company_id", referencedColumnName="id", nullable=true)
   * @Type("App\Entity\Company")
   */
  private $company;

  /**
   * @var DateTime
   * @ORM\Column(name="created_at", type="datetime")
   * @Type("DateTime")
   */
  private DateTime $createdAt;

  /**
   * @ORM\Column(name="updated_at", type="datetime", nullable=true)
   * @Type("DateTime")
   */
  private $updatedAt;

  /**
   * @ORM\Column(name="last_active", type="datetime", nullable=true)
   * @Type("DateTime")
   */
  private $lastActive;

  public function __construct($username, $email)
  {
    $this->username = $username;
    $this->email = $email;
    $this->roles = ['ROLE_USER'];
    $this->company = null;
    $this->applicant = null;
    $this->createdAt = new DateTime();
    $this->lastActive = null;
    $this->lastActive = null;
  }

  public function getId(): ?int
  {
      return $this->id;
  }

  /**
   * @deprecated since Symfony 5.3, use getUserIdentifier instead
   */
  public function getUsername(): string
  {
      return (string) $this->username;
  }

  public function setUsername(string $username): self
  {
      $this->username = $username;

      return $this;
  }

  /**
   * A visual identifier that represents this user.
   *
   * @see UserInterface
   */
  public function getUserIdentifier(): string
  {
      return (string) $this->username;
  }

  /**
   * @see UserInterface
   */
  public function getRoles(): array
  {
      $roles = $this->roles;
      // guarantee every user at least has ROLE_USER
      $roles[] = 'ROLE_USER';

      return array_unique($roles);
  }

  public function setRoles(array $roles): self
  {
      $this->roles = $roles;

      return $this;
  }

  /**
   * @see PasswordAuthenticatedUserInterface
   */
  public function getPassword(): string
  {
      return $this->password;
  }

  public function setPassword(string $password): self
  {
      $this->password = $password;

      return $this;
  }

  /**
   * Returning a salt is only needed, if you are not using a modern
   * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
   *
   * @see UserInterface
   */
  public function getSalt(): ?string
  {
      return null;
  }

  /**
   * @see UserInterface
   */
  public function eraseCredentials()
  {
      // If you store any temporary, sensitive data on the user, clear it here
      // $this->plainPassword = null;
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
}
