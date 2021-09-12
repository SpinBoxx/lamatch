<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\Type;

/**
 * @ApiResource()
 * @ORM\Table(name="skill")
 * @ORM\Entity(repositoryClass="App\Repository\SkillRepository")
 */
class Skill
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
   * @ORM\Column(name="level", type="string")
   * @Type("string")
   */
  private string $level;

  /**
   * @var string
   * @ORM\Column(name="category", type="string")
   * @Type("string")
   */
  private string $category;

  /**
   * @var mixed
   * @ORM\Column(name="sub_category", type="string", nullable=true)
   */
  private $subCategory;

  /**
   * One applicant can have one or many skills
   * @ORM\ManyToOne(targetEntity="App\Entity\Applicant", inversedBy="skills")
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
  public function getLevel(): string
  {
    return $this->level;
  }

  /**
   * @param string $level
   */
  public function setLevel(string $level): void
  {
    $this->level = $level;
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
  public function getSubCategory()
  {
    return $this->subCategory;
  }

  /**
   * @param string $subCategory
   */
  public function setSubCategory(string $subCategory): void
  {
    $this->subCategory = $subCategory;
  }

  /**
   * @return string
   */
  public function getCategory(): string
  {
    return $this->category;
  }

  /**
   * @param string $category
   */
  public function setCategory(string $category): void
  {
    $this->category = $category;
  }
}