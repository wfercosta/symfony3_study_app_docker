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

    return $query->execute();
  }

  public function deleteComment($id, $cid) {

    $query = $this->createQueryBuilder('c')
        ->select('c')
        ->join('c.post', 'p')
        ->where('p.id = :id')
        ->andWhere('c.id = :cid')
        ->setParameter('id', $id)
        ->setParameter('cid', $cid)
        ->getQuery();

    $results = $query->execute();

    $em = $this->getEntityManager();

    foreach ($results as $result) {
      $em->remove($result);
    }

    $em->flush();
    return $results;
  }

}
