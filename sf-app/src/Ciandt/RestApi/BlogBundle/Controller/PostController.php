<?php

namespace Ciandt\RestApi\BlogBundle\Controller;

use Ciandt\CommonsBundle\RestApi\Abstracts\Controller;
use Ciandt\RestApi\BlogBundle\Assembler\BlogAssemblerOut;
use Ciandt\RestApi\BlogBundle\Assembler\BlogAssemblerIn;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\View\View;
use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations\Post;
use FOS\RestBundle\Controller\Annotations\Put;
use FOS\RestBundle\Controller\Annotations\Delete;

class PostController extends Controller {

  /**
   * @return the manage instance used by this controller
   */
  public function getManager() {
    return $this->get('ciandt-managers.blog');
  }

  /**
   * @Get("/posts", name="_ciandt:post_controller:list_all")
   */
  public function listAllAction() {
    $results = $this->getManager()->listAllPostsEntries();
    return $this->handle(BlogAssemblerOut::toOutputStandardService($results));
  }

  /**
   * @Post("/posts", name="_ciandt:post_controller:add_new")
   */
  public function addNewAction(Request $request) {
    $entity = BlogAssemblerIn::toBlogPost($this->getSerializer(), $request->getContent());
    if (($output = $this->validate($entity)) != null) {
      return $this->handle($output);
    }
    $result = $this->getManager()->createPost($entity);
    return $this->handle(BlogAssemblerOut::toOutputStandardService($result));
  }

  /**
   * @Get("/posts/{id}", name="_ciandt:post_controller:find_by_id")
   */
  public function findByIdAction($id) {
    $result = $this->getManager()->getPostById($id);
    return $this->handle(BlogAssemblerOut::toOutputStandardService($result));
  }

  /**
   * @Delete("/posts/{id}", name="_ciandt:post_controller:delete")
   */
  public function deleteAction($id) {
    $result = $this->getManager()->deletePost($id);
    return $this->handle(BlogAssemblerOut::toOutputStandardService($result));
  }

  /**
   * @Post("/posts/{id}/comments", name="_ciandt:post_controller:add_new_post_comment")
   */
  public function addNewPostCommentsAction(Request $request, $id) {
    $entity = BlogAssemblerIn::toBlogComment($this->getSerializer(), $request->getContent());
    if (($output = $this->validate($entity)) != null) {
      return $this->handle($output);
    }
    $result = $this->getManager()->createPostComment($id, $entity);
    return $this->handle(BlogAssemblerOut::toOutputStandardService($result));
  }

  /**
   * @Get("/posts/{id}/comments", name="_ciandt:post_controller:find_all_post_comments")
   */
  public function listAllPostCommentsAction($id) {
    $results = $this->getManager()->listAllPostCommentsEntries($id);
    return $this->handle(BlogAssemblerOut::toOutputStandardService($results));
  }

  /**
   * @Delete("/posts/{id}/comments/{cid}", name="_ciandt:post_controller:delete_post_comment_by_id")
   */
  public function deletePostCommentByIdAction($id, $cid) {
      $results = $this->getManager()->deletePostComment($id, $cid);
      return $this->handle(BlogAssemblerOut::toOutputStandardService($results));
  }

}
