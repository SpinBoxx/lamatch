<?php

namespace App\Controller\WebService;

use App\Services\UserService;
use DateTimeImmutable;
use Firebase\JWT\JWT;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\User;
use DateTime;
use OpenApi\Annotations as OA;
use FOS\RestBundle\View\View;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class WSUserController extends AbstractFOSRestController
{
  private $appSecret;
  private EntityManagerInterface $em;
  private UserPasswordHasherInterface $hasher;
  private UserService $userService;

  //Methods: signup,login,logout,update-user-informations,getAverageAgeOfUsers

  /**
   * WSLoginController constructor.
   * @param $appSecret
   * @param EntityManagerInterface $em
   * @param UserPasswordHasherInterface $hasher
   * @param UserService $userService
   */
  public function __construct($appSecret, EntityManagerInterface $em, UserPasswordHasherInterface $hasher, UserService $userService)
  {
    $this->appSecret = $appSecret;
    $this->em = $em;
    $this->hasher = $hasher;
    $this->userService = $userService;
  }

  /**
   * Register api
   *
   * @Route("/api/signup", methods={"POST"})
   *     response=200,
   *     description="OK"
   * ),
   * @OA\Response(
   *     response=403,
   *     description=""
   * ),
   * @OA\Parameter(
   *     name="login",
   *     in="query",
   *     description="Login"
   * ),
   * @OA\Parameter(
   *     name="email",
   *     in="query",
   *     description="Email"
   * ),
   * @OA\Parameter(
   *     name="password",
   *     in="query",
   *     description="Password"
   * ),
   * @OA\Parameter(
   *     name="token",
   *     in="query",
   *     description="Token"
   * ),
   * @OA\Tag(name="signup")
   * @return Response
   */
  public function signup(Request $request)
  {
    $view = View::create();
    $view->setFormat('json');
    $params = json_decode($request->getContent());
    if(password_verify($this->appSecret, $params->token)){
      $isUniqueUsername = !$this->em->getRepository(User::class)->findOneBy(['username' => $params->username]) instanceof User;
      $isUniqueEmail = !$this->em->getRepository(User::class)->findOneBy(['email' => $params->email]) instanceof User;
      if($isUniqueEmail){
        if($isUniqueUsername){
          $newUser = new User($params->username, $params->email);
          $hashPassword = $this->hasher->hashPassword($newUser, $params->password);
          $newUser->setPassword($hashPassword);
          $this->em->persist($newUser);
          $this->em->flush();
          $view->setData(['success' => true, 'message' => 'Utilisateur crée']);
          $view->setStatusCode(Response::HTTP_OK);
          return $this->handleView($view);
        } else {
          $view->setData(['success' => false, 'message' => 'Un utilisateur à déjà le même nom d\'utilisateur. Veuillez le changer.']);
        }
      } else {
        $view->setData(['success' => false, 'message' => 'Un utilisateur à déjà le même email. Veuillez le changer.']);
      }
    } else {
      $view->setData(['success' => false, 'message' => 'Token incorrect']);
    }
    $view->setStatusCode(Response::HTTP_FORBIDDEN);
    return $this->handleView($view);
  }

  /**
   * Login api
   *
   * @Route("/api/login", methods={"POST"})
   *     response=200,
   *     description="OK"
   * ),
   * @OA\Response(
   *     response=403,
   *     description=""
   * ),
   * @OA\Parameter(
   *     name="login",
   *     in="query",
   *     description="Login"
   * ),
   * @OA\Parameter(
   *     name="password",
   *     in="query",
   *     description="Password"
   * ),
   * @OA\Parameter(
   *     name="token",
   *     in="query",
   *     description="Token"
   * ),
   * @OA\Tag(name="login")
   * @return Response
   */
  public function login(Request $request)
  {
    $view = View::create();
    $view->setFormat('json');

    $params = json_decode($request->getContent());
    if(password_verify($this->appSecret, $params->token)){
      $user = $this->em->getRepository(User::class)->findOneBy(['username' => $params->username]);
      if($user instanceof User){
        if($this->hasher->isPasswordValid($user, $params->password)){
          $now = new DateTime();
          $user->setLastActive($now);
          $this->em->persist($user);
          $this->em->flush();
          $issuedAt = new DateTimeImmutable();
          $expire = $issuedAt->modify('+60 minutes')->getTimestamp();
          $key = "i_want_to_work_with_lamacompta";
          $payload = array(
            'iat'  => $issuedAt->getTimestamp(),         // Issued at: time when the token was generated
            'iss'  => 'http://lamatch.fr',                       // Issuer
            'nbf'  => $issuedAt->getTimestamp(),         // Not before
            'exp'  => $expire,                           // Expire
            'userName' => $user->getUserIdentifier(),
          );
          $jwt = JWT::encode($payload, $key, 'HS512');
          $view->setStatusCode(Response::HTTP_OK);
          $view->setData(['token' => $jwt, 'message' => 'Vous êtes connecté', 'user' => $user]);
          return $this->handleView($view);
        } else {
          $view->setData(['success' => false, 'message' => 'Mot de passe incorrect']);
        }
      } else {
        $view->setData(['success' => false, 'message' => 'Nom d\'utilisateur introuvable']);
      }

    } else {
      $view->setData(['success' => false, 'message' => 'Token incorrect']);
    }
    $view->setStatusCode(Response::HTTP_FORBIDDEN);
    return $this->handleView($view);
  }

  /**
   * Get logged user informations api
   *
   * @Route("/api/me", methods={"GET"})
   *     response=200,
   *     description="OK"
   * ),
   * @OA\Response(
   *     response=403,
   *     description=""
   * ),
   * @OA\Parameter(
   *     name="login",
   *     in="query",
   *     description="Login"
   * ),
   * @OA\Parameter(
   *     name="password",
   *     in="query",
   *     description="Password"
   * ),
   * @OA\Parameter(
   *     name="token",
   *     in="query",
   *     description="Token"
   * ),
   * @OA\Tag(name="me")
   * @return Response
   */
  public function me(Request $request)
  {
    $view = View::create();
    $view->setFormat('json');

    $token = getallheaders()['Authorization'];
    // I DELETE THE FIRST CARACTER (WAS THE TOKEN SIGNATURE) : "Bearer "
    $token = substr($token,7);
    $decoded = JWT::decode($token, 'i_want_to_work_with_lamacompta', array('HS512'));
    $user = $this->em->getRepository(User::class)->findOneBy(['username' => $decoded->userName]);
    
    if($user instanceof User){
      $view->setData(['user' => [
        $user,
        $this->userService->getUserApplicant($user),
        $this->userService->getUserSkills($user),
        $this->userService->getUserFormations($user),
        $this->userService->getUserProfessionalExperiences($user),
        $this->userService->getUserSoughtRegions($user)
      ]]);
      $view->setStatusCode(Response::HTTP_OK);
    }
    return $this->handleView($view);
  }

  /**
   * Get logged user informations api
   *
   * @Route("/api/logout", methods={"DELETE"})
   *     response=200,
   *     description="OK"
   * ),
   * @OA\Response(
   *     response=403,
   *     description=""
   * ),
   * @OA\Parameter(
   *     name="login",
   *     in="query",
   *     description="Login"
   * ),
   * @OA\Parameter(
   *     name="password",
   *     in="query",
   *     description="Password"
   * ),
   * @OA\Parameter(
   *     name="token",
   *     in="query",
   *     description="Token"
   * ),
   * @OA\Tag(name="logout")
   * @return Response
   */
  public function logout(Request $request)
  {
    $view = View::create();
    $view->setFormat('json');
    return $this->handleView($view);
  }

  /**
   * Update user informations
   *
   * @Route("/api/user/update-informations", methods={"POST"})
   *     response=200,
   *     description="OK"
   * ),
   * @OA\Response(
   *     response=403,
   *     description=""
   * ),
   * @OA\Parameter(
   *     name="email",
   *     in="query",
   *     description="Email"
   * ),
   * @OA\Parameter(
   *     name="oldPassword",
   *     in="query",
   *     description="The old password"
   * ),
   * @OA\Parameter(
   *     name="newPassword",
   *     in="query",
   *     description="The new password"
   * ),
   * @OA\Parameter(
   *     name="token",
   *     in="query",
   *     description="Token"
   * ),
   * @OA\Tag(name="update-user-informations")
   * @return Response
   */
  public function updateUserInformations(Request $request)
  {
    $view = View::create();
    $view->setFormat('json');
    $params = json_decode($request->getContent());

    if(password_verify($this->appSecret, $params->token)){
      // TODO CREATE A UNiQUE TOKEN USER TO AUTHENTICATE THE USER BECAUSE WITH THE USER'S ID ITS NOT SECURE
      $user = $this->em->getRepository(User::class)->find($params->id);
      if ($user instanceof User){
        // TO UPDATE THE EMAIL
        if($params->email !== $user->getEmail()){
          $isUniqueEmail = $this->em->getRepository(User::class)->findOneBy(['email' => $params->email]);
          if(is_null($isUniqueEmail)){
            $user->setEmail($params->email);
            $now = new DateTime();
            $user->setUpdatedAt($now);
            $this->em->persist($user);
            $view->setData(['success' => true, 'message' => 'L\'email a été changé.']);
          } else {
            $view->setData(['success' => true, 'message' => 'L\'email est déjà pris.']);
          }
        }
        // TO UPDATE THE PASSWORD
        if($params->oldPassword !== '' && $params->newPassword !== ''){
          if($this->hasher->isPasswordValid($user, $params->oldPassword)){
            $user->setPassword($this->hasher->hashPassword($user, $params->newPassword));
            $now = new DateTime();
            $user->setUpdatedAt($now);
            $this->em->persist($user);
            $view->setData(['success' => true, 'message' => 'Mot de passe changé']);
          } else {
            $view->setData(['success' => false, 'message' => 'L\'ancien mot de passe est incorrect']);
          }
        }
      } else {
        $view->setData(['success' => false, 'message' => 'L\'utilisateur est introuvable']);
      }
    } else {
      $view->setData(['success' => false, 'message' => 'Token incorrect']);
    }
    $this->em->flush();
    return $this->handleView($view);
  }
}