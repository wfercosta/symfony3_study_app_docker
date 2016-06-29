<?php

namespace Ciandt\ManagerBundle\Managers\Blog;

use Ciandt\CommonsBundle\Exceptions as CustomExceptions;
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
      if (empty($post->getCreatedAt())){
        $post->setCreatedAt(new \DateTime());
      }
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

  /**
   * Find a post by id
   * @param integer $id Post Identification
   */
  public function getPostById($id) {
    $output = new OutputStandardManager();
    try {
      $output->setObject($this->findPostById($id));
    } catch (\Doctrine\DBAL\DBALException $e) {
      $output->addError($e->getCode(),
        'Unexpected failure during the manager execution',
        $e->getMessage());
    } catch (CustomExceptions\PostNotFoundException $e) {
      $output->addError($e->getCode(),
          $e->getMessage());
    }
    return $output;
  }

  /**
   * Finds a post entity by it's id
   * @param integer $id Post Identification
   */
  private function findPostById($id) {
    $repository = $this->getRepository(IBlogManager::REPOSITORY_ENTITY_NAME_BLOG_POSTS);
    if (($entity = $repository->find($id)) == null) {
        throw new CustomExceptions\PostNotFoundException ('Blog post with id: ' . $id . ' was not found.', 404);
    }

    return $entity;
  }

  /**
   * Deletes a post
   * @param integer $id Post Identification
   */
  public function deletePost($id) {
    $output = new OutputStandardManager();
    try {
      $entity = $this->findPostById($id);
      $em = $this->getEntityManager();
      $em->remove($entity);
      $em->flush();
      $output->setObject($entity);
    } catch (\Doctrine\DBAL\DBALException $e) {
      $output->addError($e->getCode(),
        'Unexpected failure during the manager execution',
        $e->getMessage());
    } catch (CustomExceptions\PostNotFoundException $e) {
      $output->addError($e->getCode(),
        $e->getMessage());
    }
    return $output;
  }

}
