<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TagRepository")
 */
class Tag {
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;
    function getId() {
        return $this->id;
    }
    /**
     * Many tags have Many Posts.
     * @ORM\ManytoMany(targetEntity="Post", mappedBy="tag")
     */
    private $posts;
    function __construct() {
        $this->posts=new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    private $tag;
    function getTag() {
        return $this->tag;
    }

    function setTag($tag) {
        $this->tag = $tag;
    }

    public function __toString(){
        return $this->tag;
    }
    
}
