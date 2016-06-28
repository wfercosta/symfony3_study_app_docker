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


class CommentsController extends ControllerAbstract {

  public function getManager() {
    return $this->get('blog_post_manager');
  }

  public function getAssembler() {
    return $this->get('entities.assembler');
  }

}
