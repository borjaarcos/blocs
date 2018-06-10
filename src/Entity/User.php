<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User implements UserInterface
{
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
    private $picture;
    function getPicture() {
        return $this->picture;
    }

    function setPicture($picture) {
        $this->picture = $picture;
    }

     /**
     * @ORM\Column(type="string",length=15,unique=true)
     */
    private $username;
    /**
     * @ORM\Column(type="string")
     */
    private $email;
    /**
     * @ORM\Column(type="string")
     */
    private $passw;
    /**
     * @ORM\Column(type="string",length=20)
     */
    private $role;
    /**
     * @ORM\Column(type="datetime",nullable=true)
     */
    private $lastlogin;
    /**
     * @ORM\Column(type="boolean",name="isActive")
     */
    private $isActive;
    
    /**
     *  One user has many posts
     * @ORM\OneToMany(targetEntity="App\Entity\Post",mappedBy="User")
     * @ORM\JoinColumn(nullable=true)
     */
    private $posts;
    public function getPosts(){
        return $this->posts;
    }
    public function __construct() {
       
        $this->posts=new ArrayCollection();
        $this->comments=new ArrayCollection();
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
     * @Assert\Length(
     *     min = 6,
     *     minMessage = "Password should by at least 6 chars long"
     * )
     */
    private $plainPassword;
    function getPlainPassword() {
        return $this->plainPassword;
    }

    function setPlainPassword($plainPassword) {
        $this->plainPassword = $plainPassword;
    }

    
    public function eraseCredentials() {
        
    }

    public function getPassword(): string {
        return $this->passw;
    }

    public function getRoles() {
        return array($this->getRole());
    }

    public function getSalt() {
        return null;
    }

    public function getUsername() {
        return $this->username;
    }
    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getPassw() {
        return $this->passw;
    }

    public function getRole() {
        return $this->role;
    }

    public function getLastlogin() {
        return $this->lastlogin;
    }

    public function getIsActive() {
        return $this->isActive;
    }
    public function setUsername($username){
        $this->username=$username;
    }
    public function setPassw($passw) {
        $this->passw = $passw;
    }

    public function setRole($role) {
        $this->role = $role;
    }

    public function setLastlogin($lastlogin) {
        $this->lastlogin = $lastlogin;
    }

    public function setIsActive($isActive) {
        $this->isActive = $isActive;
    }



}
