<?php

namespace Ciandt\ManagerBundle\Managers\Blog;

use Ciandt\CommonsBundle\Entity as Entities;

interface IBlogManager {

  const REPOSITORY_ENTITY_NAME_BLOG_POSTS = 'CiandtCommonsBundle:BlogPost';
  const REPOSITORY_ENTITY_NAME_BLOG_COMMENTS = 'CiandtCommonsBundle:BlogComment';

  public function listAllPostsEntries();

  public function createPost(Entities\BlogPost $post);

  public function getPostById($id);

  public function deletePost($id);

  public function createPostComment($id, Entities\BlogComment $comment);

  public function listAllPostCommentsEntries($id);


}
