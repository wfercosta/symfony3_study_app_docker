<?php

namespace Ciandt\CommonsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BlogComment
 *
 * @ORM\Table(name="blog_comment", indexes={@ORM\Index(name="blog_comment_post_id_idx", columns={"post_id"})})
 * @ORM\Entity(repositoryClass="Ciandt\CommonsBundle\Entity\Repositories\BlogCommentRepository")
 */
class BlogComment
{
    /**
     * @var string
     *
     * @ORM\Column(name="author", type="string", length=20, nullable=false)
     */
    private $author;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text", nullable=false)
     */
    private $content;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=false)
     */
    private $createdAt;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \Ciandt\CommonsBundle\Entity\BlogPost
     *
     * @ORM\ManyToOne(targetEntity="Ciandt\CommonsBundle\Entity\BlogPost")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="post_id", referencedColumnName="id")
     * })
     */
    private $post;


}
