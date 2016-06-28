<?php

namespace Company\Comum\EntitiesBundle\Util;

class Assembler {

  private $serializer;

  public function __construct($serializer) {
      $this->serializer = $serializer;
  }

  public function toBlogPost($json) {
    $object =
      $this->serializer->deserialize(
        $json, 'Company\Comum\EntitiesBundle\Entity\BlogPost', 'json');
    return $object;
  }

}
