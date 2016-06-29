<?php

namespace Ciandt\ManagerBundle\Managers\Blog;

use Ciandt\CommonsBundle\Entity as Entities;

interface IBlogManager {

  const REPOSITORY_ENTITY_NAME_BLOG_POSTS = 'CiandtCommonsBundle:BlogPost';

  public function listAllPostsEntries();

  public function createPost(Entities\BlogPost $post);

}
