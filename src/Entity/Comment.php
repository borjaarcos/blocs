<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity(repositoryClass="App\Repository\CommentsRepository")
 */
class Comment {
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
    private $comment;
    function getComment() {
        return $this->comment;
    }

    function setComment($comment) {
        $this->comment = $comment;
    }
    /**
     * One user has many comments
     * @ORM\OneToOne(targetEntity="App\Entity\User",mappedBy="Comment")
     * @ORM\JoinColumn(nullable=true)
     */
    private $user;
    function getUser():user {
        return $this->user;
    }
    /**
     * One user has many comments
     * @ORM\OneToOne(targetEntity="App\Entity\User",mappedBy="Post")
     * @ORM\JoinColumn(nullable=true)
     */
    private $post;
    function getPost():post {
        return $this->post;
    }


}