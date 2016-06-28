<?php
namespace Company\API\V1\BlogBundle\Controller;

use Company\Comum\ControllerBundle\Controller\ControllerAbstract;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\View\View;
use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations\Post;
use FOS\RestBundle\Controller\Annotations\Put;
use FOS\RestBundle\Controller\Annotations\Delete;

class PostController extends ControllerAbstract {

  public function getManager() {
    return $this->get('blog_post_manager');
  }

  public function getAssembler() {
    return $this->get('entities.assembler');
  }

  /**
   * @Get("/posts", name="blog_post_list_all")
   */
  public function listAction () {
    $results = $this->getManager()->listAllElements();
    $view = View::create();
    $handler = $this->get('fos_rest.view_handler');
    $view->setStatusCode(200);
    $view->setData($results);
    return $handler->handle($view);
  }

  /**
   * @Post("/posts", name="blog_post_insert")
   */
  public function insertAction(Request $request) {
    $entity = $this->getAssembler()->toBlogPost($request->getContent());
    $entity = $this->getManager()->newElement($entity);
    $view = View::create();
    $handler = $this->get('fos_rest.view_handler');
    $view->setStatusCode(200);
    $view->setData($entity);
    return $handler->handle($view);
  }

}
