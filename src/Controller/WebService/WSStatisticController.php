<?php

namespace App\Controller\WebService;

use App\Entity\Applicant;
use App\Entity\SoughtRegion;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations\Route;
use Doctrine\ORM\EntityManagerInterface;
use DateTime;
use OpenApi\Annotations as OA;
use FOS\RestBundle\View\View;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class WSStatisticController extends AbstractFOSRestController
{
  private $appSecret;
  private EntityManagerInterface $em;

  //Methods: getAverageAgeOfApplicant

  /**
   * WSLoginController constructor.
   */
  public function __construct($appSecret, EntityManagerInterface $em)
  {
    $this->appSecret = $appSecret;
    $this->em = $em;
  }

  /**
   * Get the average age of applicants
   *
   * @Route("/api/get-average-age", methods={"POST"})
   *     response=200,
   *     description="OK"
   * ),
   * @OA\Response(
   *     response=403,
   *     description=""
   * ),
   * @OA\Parameter(
   *     name="token",
   *     in="query",
   *     description="Token"
   * ),
   * @OA\Tag(name="get-average-age-of-applicant")
   * @return Response
   */
  public function getAverageAgeOfApplicant(Request $request)
  {
    $view = View::create();
    $view->setFormat('json');
    $params = json_decode($request->getContent());

    if(password_verify($this->appSecret, $params->token)){
      $applicants = $this->em->getRepository(Applicant::class)->findAll();
      $tmpSumYear = 0;
      $i = 0;
      foreach ($applicants as $applicant){
        if($applicant instanceof Applicant){
          $tmpSumYear += $applicant->getBirthday()->format('Y');
          $i++;
        }
      }
      $now = new DateTime();
      $view->setData(['success' => true, 'averageYear' =>  $now->format('Y') - ($tmpSumYear / $i)]);
    } else {
      $view->setData(['success' => false, 'message' => 'Token incorrect']);
    }
    $this->em->flush();
    return $this->handleView($view);
  }

  /**
   * Get the top 3 sought regions by companies and applicants
   *
   * @Route("/api/get-most-sought-regions", methods={"POST"})
   *     response=200,
   *     description="OK"
   * ),
   * @OA\Response(
   *     response=403,
   *     description=""
   * ),
   * @OA\Parameter(
   *     name="token",
   *     in="query",
   *     description="Token"
   * ),
   * @OA\Tag(name="get-most-sought-regions")
   * @return Response
   */
  public function getMostSoughtRegion(Request $request)
  {
    $view = View::create();
    $view->setFormat('json');
    $params = json_decode($request->getContent());
    if(password_verify($this->appSecret, $params->token)){
      $regionsByApplicants = $this->em->getRepository(SoughtRegion::class)->getMostSoughtRegionsByApplicant();
      $regionsByCompanies = $this->em->getRepository(SoughtRegion::class)->getMostSoughtRegionsByCompanies();
      $view->setData(['success' => true, 'regions' => ['regionsByApplicants' => $regionsByApplicants, 'regionsByCompanies' => $regionsByCompanies]]);
    } else {
      $view->setData(['success' => false, 'message' => 'Token incorrect']);
    }
    $this->em->flush();
    return $this->handleView($view);
  }
}