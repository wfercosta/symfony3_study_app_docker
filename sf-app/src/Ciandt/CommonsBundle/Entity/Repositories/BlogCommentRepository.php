<?php
namespace Ciandt\CommonsBundle\Entity\Repositories;
use Doctrine\ORM\EntityRepository;


class BlogCommentRepository extends EntityRepository {

  public function findAllByPostId($id) {

    $query = $this->createQueryBuilder('c')
        ->select('c')
        ->join('c.post', 'p')
        ->where('p.id = :id')
        ->setParameter('id', $id)
        ->getQuery();

    return $query->getArrayResult();
  }

}
