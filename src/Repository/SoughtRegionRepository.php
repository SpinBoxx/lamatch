<?php
/**
 * Created by PhpStorm.
 * user: Antonin
 * Date: 04/11/2020
 * Time: 10:34
 */

namespace App\Repository;

use App\Entity\Applicant;
use App\Entity\SoughtRegion;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

class SoughtRegionRepository extends ServiceEntityRepository
{
  public function __construct(ManagerRegistry $registry)
  {
    parent::__construct($registry, SoughtRegion::class);
  }

  /**
   * @param Applicant $applicant
   * @return int|mixed|string
   */
  public function groupBySoughtRegionByApplicant(Applicant $applicant)
  {
    return $this->createQueryBuilder('sr')
      ->select('sr')
      ->andWhere('sr.applicant = :applicantId' )
      ->setParameter('applicantId', $applicant->getId())
      ->groupBy('sr.region')
      ->getQuery()->getResult();
  }

  /**
   * @return int|mixed|string
   */
  public function getMostSoughtRegionsByCompanies()
  {
    return $this->createQueryBuilder('sr')
      ->select('sr.region, Count(sr.region) as nb')
      ->andWhere('sr.applicant is NULL')
      ->groupBy('sr.region')
      ->orderBy('nb', 'DESC')
      ->setMaxResults(3)
      ->getQuery()->getResult();
  }

  /**
   * @return int|mixed|string
   */
  public function getMostSoughtRegionsByApplicant()
  {
    return $this->createQueryBuilder('sr')
      ->select('sr.region, Count(sr.region) as nb')
      ->andWhere('sr.company is NULL')
      ->groupBy('sr.region')
      ->orderBy('nb', 'DESC')
      ->setMaxResults(3)
      ->getQuery()->getResult();
  }
}
