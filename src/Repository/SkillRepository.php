<?php
/**
 * Created by PhpStorm.
 * user: Antonin
 * Date: 04/11/2020
 * Time: 10:34
 */

namespace App\Repository;

use App\Entity\Applicant;
use App\Entity\Skill;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

class SkillRepository extends ServiceEntityRepository
{
  public function __construct(ManagerRegistry $registry)
  {
    parent::__construct($registry, Skill::class);
  }

  /**
   * @param Applicant $applicant
   * @return int|mixed|string
   */
  public function groupBySkillsByApplicant(Applicant $applicant)
  {
    return $this->createQueryBuilder('skill')
      ->select('skill')
      ->andWhere('skill.applicant = :applicantId' )
      ->setParameter('applicantId', $applicant->getId())
      ->groupBy('skill.category')
      ->getQuery()->getResult();
  }
}
