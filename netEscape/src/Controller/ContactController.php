<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\ContactMessages;
use App\Form\ContactType;
use App\Repository\ContactMessagesRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="contact")
     */
    public function DisplayForm(Request $request, \Swift_Mailer $mailer)
    {
        $contactMess = new ContactMessages();
        $form = $this->createForm(ContactType::class, $contactMess);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) 
        {
            $contactMess->setDate(new \DateTime());
            $email = $contactMess->getEmail();
            $name = $contactMess->getUsername();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($contactMess);
            $entityManager->flush();

            $messageToCustomer= (new \Swift_Message('Email confirmation'))
            ->setFrom('projetnetescape@gmail.com')
            ->setTo($email)
            ->setBody(
                $this->renderView(
                    'contact/mailtemplate.html.twig',
                    ['name' => $name]
                ),'text/html');

        
            $mailer->send($messageToCustomer);
            
            $messageToAdmin= (new \Swift_Message('New Contact Form'))
            ->setFrom('projetnetescape@gmail.com')
            ->setTo('projetnetescape@gmail.com')
            ->setBody(
                $this->renderView(
                    'contact/mailtemplate.html.twig',
                    ['name' => $name]
                ),'text/html');





            return $this->redirectToRoute('contact');
        }

        return $this->render('contact/new.html.twig', [
            'form' => $form->createView(),
        ]);
    
    }
}
