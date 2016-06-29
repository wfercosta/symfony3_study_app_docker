<?php

namespace Ciandt\RestApi\BlogBundle\Controller;

use Ciandt\CommonsBundle\RestApi\Abstracts\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\View\View;
use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations\Post;
use FOS\RestBundle\Controller\Annotations\Put;
use FOS\RestBundle\Controller\Annotations\Delete;

class PostController extends Controller {

  public function getManager() {
    return $this->get('ciandt-managers.blog');
  }

  /**
   * @Get("/posts", name="blog_post_list_all")
   */
  public function listAction () {
    $results = $this->getManager()->listAllPostsEntries();
    return $this->handle($results);
  }

  /**
   * @Post("/posts", name="blog_post_insert")
   */
  public function insertAction(Request $request) {
    $entity = $this->getAssembler()->toBlogPost($request->getContent());
    $entity = $this->getManager()->newElement($entity);
    return $this->handle($entity);;
  }

}
