<?php

namespace Ciandt\RestApi\BlogBundle\Assembler;

class BlogAssemblerIn {

  const TYPE_BLOG_POST = 'Ciandt\CommonsBundle\Entity\BlogPost';

  static final public function toBlogPost($serializer, $content) {
    return $serializer->deserialize($content, BlogAssemblerIn::TYPE_BLOG_POST, 'json');
  }

}
