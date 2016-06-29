<?php

namespace Ciandt\CommonsBundle\Manager\Abstracts;

abstract class Manager {

  private $orm;

  public function __construct($orm) {
    $this->orm = $orm;
  }

  final public function getPersistenceService() {
    return $this->orm;
  }

  final public function getEntityManager() {
    return $this->getPersistenceService()->getManager();
  }

  final public function getRepository($repository) {
    $entityManager = $this->getEntityManager();
    return $entityManager->getRepository($repository);
  }

}
