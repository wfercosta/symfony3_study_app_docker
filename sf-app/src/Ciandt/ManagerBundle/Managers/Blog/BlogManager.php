<?php

namespace Ciandt\ManagerBundle\Managers\Blog;

use Ciandt\CommonsBundle\Manager\Abstracts\Manager;

class BlogManager extends Manager implements IBlogManager {

  public function listAllPostsEntries() {
    $repository = $this->getRepository(IBlogManager::REPOSITORY_ENTITY_NAME_BLOG_POSTS);
    return $repository->findAll();
  }

}
