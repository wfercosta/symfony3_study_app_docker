<?php
namespace Company\API\V1\ProdutosBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

/**
 * @Route("/api/v1/produtos")
 */
class ProdutosController extends Controller {

  /**
   * @Route("/", name="produtos")
   * @Method("GET")
   */
  public function performProdutosAction () {

    $data = null;

    return new JsonResponse($data);
  }

}
