<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Post;

class PostController extends Controller
{
    /**
     * @Route("/post", name="post")
     */
    public function newPost(Request $request){
        
       $post=new Post();
       $user=$this->getUser();
       $post->setAuthor($user);
       $form = $this->createForm(\App\Form\PostType::class, $post); 
       $form->handleRequest($request);
       if ($form->isSubmitted() && $form->isValid()) {
           $post=$form->getData();
           $em = $this->getDoctrine()->getManager();
           $em->persist($post);
           $em->flush();
           return $this->redirectToRoute('home');
       }
           return $this->render('post/new_post.html.twig', array(
            'user'=>$user,   
            'form' => $form->createView()            
        ));
    }

    
}
