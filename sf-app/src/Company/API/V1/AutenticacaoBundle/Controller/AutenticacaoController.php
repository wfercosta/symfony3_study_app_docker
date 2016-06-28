<?php
namespace Company\API\V1\AutenticacaoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

/**
 * @Route("/api/v1/autenticacao")
 */
class AutenticacaoController extends Controller {

  /**
   * @Route("/", name="authentication-auth")
   * @Method("GET")
   */
  public function performAuthenticationAction () {

    $data = null;

    return new JsonResponse($data);
  }

}
