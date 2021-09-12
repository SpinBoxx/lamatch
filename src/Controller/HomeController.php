<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController
{
  /**
   * @Route("/", name="app_register")
   * @return string
   */
  public function home(){
    var_dump(php_info());
    die();
    return new Response("cc");
  }
  /**
   * @Route("/cc", name="app_register")
   * @return string
   */
  public function cc(){
    return new Response("cc");
  }
}