<?php

namespace Ciandt\ManagerBundle\Managers\Blog;

use Ciandt\CommonsBundle\Manager\Abstracts\Manager;
use Ciandt\CommonsBundle\Manager\ValueObjects\OutputStandardManager;

class BlogManager extends Manager implements IBlogManager {

  /**
   * List all post entries
   * @return OutputStandardManager with all errors and warnings
   */
  public function listAllPostsEntries() {
    $output = new OutputStandardManager();
    try {
      $repository = $this->getRepository(IBlogManager::REPOSITORY_ENTITY_NAME_BLOG_POSTS);
      $output->setObject($repository->findAll());
    } catch (Exception $e) {
      $output->addError('500',
        'Unexpected failure during the manager execution',
        $e->getMessage());
    }
    return $output;
  }

}
