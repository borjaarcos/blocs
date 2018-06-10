<?php
namespace App\Controller\Admin;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use App\Entity\Post;
use App\Entity\User;

class admincontroller extends Controller{
    public function listusers(){
        $users= $this->getDoctrine()->getRepository();
    }
    public function editUser(/*Request $request,*/ User $user){
        $form = $this->createForm(
                UserEditType::class, $user);
        $form->handleRequest;
        if($form->isSubmitted() && $form->isValid()){
            $user = $form->getData();
        }
    }
    
}
