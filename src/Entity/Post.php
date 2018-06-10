<?php

namespace App\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity(repositoryClass="App\Repository\PostRepository")
 */
class Post {
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;
    function getId() {
        return $this->id;
    }

    function setId($id) {
        $this->id = $id;
    }
    /**
     * @ORM\Column(type="string",nullable=true)
     */
    protected $title;
    public function setTitle($title){
        $this->title=$title;
    }
    public function getTitle(){
        return $this->title;
    }
    /**
     * @ORM\Column(type="string",nullable=true)
     */
    protected $content;
    public function setContent($content){
        $this->content=$content;
    }
    public function getContent(){
        return $this->content;
    }
    /**
     * @ORM\Column(type="string",nullable=true)
     */
    protected $author;
    public function setAuthor($author){
        $this->author=$author;
    }
    public function getAuthor(){
        return $this->author;
    }
    /**
     * One user has many comments
     * @ORM\OneToMany(targetEntity="App\Entity\Comment",mappedBy="User")
     * @ORM\JoinColumn(nullable=true)
     */
    private $comments;
    public function getComments(){
        return $this->comments;
    }
    /**
     * Many Posts have Many Tags.
     * @ORM\ManyToMany(targetEntity="Tag", inversedBy="posts")
     * @ORM\JoinTable(name="post_tags")
     */
    private $tags;
    public function __construct() {
        $this->tags = new ArrayCollection();
    }

}
