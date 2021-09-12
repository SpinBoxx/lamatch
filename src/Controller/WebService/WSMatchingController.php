<?php

namespace App\Controller\WebService;

use App\Services\MatchingService;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\User;
use OpenApi\Annotations as OA;
use FOS\RestBundle\View\View;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class WSMatchingController extends AbstractFOSRestController
{
  private $appSecret;
  private EntityManagerInterface $em;
  private MatchingService $matchingService;

//  methods: matching

  /**
   * WSLoginController constructor.
   * @param $appSecret
   * @param EntityManagerInterface $em
   * @param MatchingService $matchingService
   */
  public function __construct($appSecret, EntityManagerInterface $em, MatchingService $matchingService)
  {
    $this->appSecret = $appSecret;
    $this->em = $em;
    $this->matchingService = $matchingService;
  }

  /**
   * Get the companies the user matched with
   *
   * @Route("/api/matching", methods={"POST"})
   *     response=200,
   *     description="OK"
   * ),
   * @OA\Response(
   *     response=403,
   *     description=""
   * ),
   * @OA\Parameter(
   *     name="id",
   *     in="query",
   *     description="User id"
   * ),
   * @OA\Parameter(
   *     name="token",
   *     in="query",
   *     description="Token"
   * ),
   * @OA\Tag(name="Matching")
   * @return Response
   */
  public function matching(Request $request)
  {
    $view = View::create();
    $view->setFormat('json');
    $params = json_decode($request->getContent());
    if(password_verify($this->appSecret, $params->token)){
      // TODO CREATE A UNiQUE TOKEN USER TO AUTHENTICATE THE USER BECAUSE WITH THE USER'S ID ITS NOT SECURE
      $user = $this->em->getRepository(User::class)->find($params->id);
      if ($user instanceof User){
        if(!is_null($user->getApplicant())){
          $view->setData(['success' => true,
            'message' => 'Retrouvez les entreprises avec lesquelles vous avez matché juste en dessous !',
            'companies' => $this->matchingService->getMatchingCompanies($user)
          ]);
        } else {
          $view->setData(['success' => false, 'message' => 'Veuillez ajouter votre CV']);
        }
      } else {
        $view->setData(['success' => false, 'message' => 'L\'utilisateur est introuvable']);
      }
    } else {
      $view->setData(['success' => false, 'message' => 'Token incorrect']);
    }
    return $this->handleView($view);
  }
}