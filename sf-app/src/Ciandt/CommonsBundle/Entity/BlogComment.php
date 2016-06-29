<?php

namespace Ciandt\CommonsBundle\Entity;

/**
 * BlogComment
 */
class BlogComment
{
    /**
     * @var string
     */
    private $author;

    /**
     * @var string
     */
    private $content;

    /**
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var \Ciandt\CommonsBundle\Entity\BlogPost
     */
    private $post;


    /**
     * Set author
     *
     * @param string $author
     *
     * @return BlogComment
     */
    public function setAuthor($author)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get author
     *
     * @return string
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set content
     *
     * @param string $content
     *
     * @return BlogComment
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return BlogComment
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set post
     *
     * @param \Ciandt\CommonsBundle\Entity\BlogPost $post
     *
     * @return BlogComment
     */
    public function setPost(\Ciandt\CommonsBundle\Entity\BlogPost $post = null)
    {
        $this->post = $post;

        return $this;
    }

    /**
     * Get post
     *
     * @return \Ciandt\CommonsBundle\Entity\BlogPost
     */
    public function getPost()
    {
        return $this->post;
    }
}

