<?php

namespace Company\Comum\BusinessObjectsBundle\Blog;

class PostManager
{
      private $orm;

      public function __construct($orm) {
          $this->orm = $orm;
      }

      private function getRepository() {
        $em = $this->orm->getManager();
        $repository = $em->getRepository('CompanyComumEntitiesBundle:BlogPost');
        return $repository;
      }

      public function listAllElements() {
        $posts = $this->getRepository()->findAll();
        return $posts;
      }

      public function newElement($entity) {
        $em = $this->orm->getManager();

        if (empty($entity->getCreatedAt())){
          $entity->setCreatedAt(new \DateTime());
        }

        $em->persist($entity);
        $em->flush();
        return $entity;
      }
}
