<?php

namespace Ciandt\ManagerBundle\Managers\Blog;


interface IBlogManager {

  const REPOSITORY_ENTITY_NAME_BLOG_POSTS = 'CiandtCommonsBundle:BlogPost';

  public function listAllPostsEntries();

}
