<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
Use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
Use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
Use App\Entity\User;
Use App\Form\RegisterType;
use App\Repository\UserRepository;

class UserController extends Controller
{
    /**
     * @Route("/homeUser", name="homeUser")
     */
    public function index(AuthenticationUtils $authUtils)
    {   
        $user = $this->getUser();
        return $this->render('user/index.html.twig', [
            'user'=>$user,
            'controller_name' => 'HomeController',
        ]);
    }
    
     public function login(Request $request, AuthenticationUtils $authUtils){
        $error = $authUtils->getLastAuthenticationError();

        // last username entered by the user
        $lastUsername = $authUtils->getLastUsername();

        return $this->render('user/login.html.twig',[
            'error'=>$error,
            'last_username'=>$lastUsername
        ]);
        
    }
    public function logout(){
        $this->redirectToRoute("logout");
    }

    
    /**
 	* @Route("/register",name="register")
 	*/
	public function register(Request $request, UserPasswordEncoderInterface $passwordEncoder)
    {       
        $user = new User();
        //establishing default role and putting it active
        $user->setRole('ROLE_USER');
        $user->setIsActive(true);
        
        //creating the form
        $form = $this->createForm(RegisterType::class, $user);
        

        $form->handleRequest($request);
        $error=$form->getErrors();

        if ($form->isSubmitted() && $form->isValid()) {
            
           
            
            //encoding password
            $password=$passwordEncoder->encodePassword($user, $user->getPlainPassword());
            $user->setPassw($password);

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();
            $status="User registered";
            $this->get('session')->getFlashBag()->add("status", $status);
            return $this->redirectToRoute('homeUser');
        }
        //rendering form
        return $this->render('user/regform.html.twig', array(
            'error'=>$error,
            'form' => $form->createView()
            
        ));
         
    }

    public function usernameTest(Request $request, UserRepository $user_repos){
	//takes username from form
    	$username= $request->get("username");
	// testing if exists in database
    	$em=$this->getDoctrine()->getManager(); 
    	$user_isset=$user_repos->findOneBy(['username'=>$username]);
    	$res="used";
    	if(count($user_isset)>=1 && is_object($user_isset)){
        	$res="used";
       	 
    	}else{
        	$res="unused";
    	}
	//returns an AJAX Response
    	return new Response($res);
    }

    
}
