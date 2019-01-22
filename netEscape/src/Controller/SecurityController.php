<?php

namespace App\Controller;

use App\Entity\Users;
use App\Form\UsersType;

use App\Form\RegistrationType;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class SecurityController extends AbstractController
{
    /**
     * @Route("/register", name="register")
     */ 
   public function registration(Request $request, ObjectManager $manager, UserPasswordEncoderInterface $encoder){
       $user = new Users();

       $form = $this->createForm(UsersType::class, $user); // créer formulaire à partir de RegistrationType
       $form->handleRequest($request);

       if($form->isSubmitted() && $form->isValid()){
           $encoded = $encoder->encodePassword($user, $user->getPassword()); //crypter le password

           $user->setPassword($encoded); //password crypté à mettre dans la table
           $manager->persist($user);
           $manager->flush();   //envoyer la requête

           return $this->redirectToRoute('login');
       }

       return $this->render('security/register.html.twig', [
           'form' => $form->createView()
       ]);
   }

   /**
    * @Route("/login", name="login")
    */
   public function login(){
       return $this->render('security/login.html.twig');
    }

    /**
     * @Route("/logout", name="logout")
     */
    public function logout(){
        
    }
}
