<?php
namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends \Symfony\Bundle\FrameworkBundle\Controller\Controller{
    /**
     *  @Route("/",name="homeaction")
     */

    public function indexAction($name="demo"){
        return $this->render('default/index.html.twig',['name'=>$name]);
    }
}

