<?php

namespace Ciandt\RestApi\BlogBundle\Assembler;

class BlogAssemblerIn {

  const TYPE_BLOG_POST = 'Ciandt\CommonsBundle\Entity\BlogPost';
  const TYPE_BLOG_COMMENT = 'Ciandt\CommonsBundle\Entity\BlogComment';

  static final public function toBlogPost($serializer, $content) {
    return $serializer->deserialize($content, BlogAssemblerIn::TYPE_BLOG_POST, 'json');
  }

  static final public function toBlogComment($serializer, $content) {
    return $serializer->deserialize($content, BlogAssemblerIn::TYPE_BLOG_COMMENT, 'json');
  }

}
