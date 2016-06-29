<?php

namespace Ciandt\ManagerBundle\Managers\Blog;

use Ciandt\CommonsBundle\Manager\Abstracts\Manager;
use Ciandt\CommonsBundle\Manager\ValueObjects\OutputStandardManager;
use Ciandt\CommonsBundle\Entity as Entities;

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
    } catch (\Doctrine\DBAL\DBALException $e) {
      $output->addError('500',
        'Unexpected failure during the manager execution',
        $e->getMessage());
    }
    return $output;
  }

  /**
   * Create a new post
   * @param Entities\BlogPost $post the new post
   */
  public function createPost(Entities\BlogPost $post) {
    $output = new OutputStandardManager();

    try {

      $em = $this->getEntityManager();
      // if (empty($post->getCreatedAt())){
      //   $post->setCreatedAt(new \DateTime());
      // }
      $em->persist($post);
      $em->flush();
      $output->setObject($post);

    } catch (\Doctrine\DBAL\DBALException $e) {
      $output->addError('500',
        'Unexpected failure during the manager execution',
        $e->getMessage());
    }
    return $output;
  }

}
