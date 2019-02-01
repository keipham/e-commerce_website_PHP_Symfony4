<?php

namespace App\Controller;

use App\Entity\ContactMessages;
use App\Form\ContactMessagesType;
use App\Repository\ContactMessagesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class ContactMessagesController extends AbstractController
{
    // /**
    //  * @Route(/admin/contact/messages/", name="contact_messages_index", methods={"GET"})
    //  */
    // public function index(ContactMessagesRepository $contactMessagesRepository): Response
    // {
    //     return $this->render('contact_messages/index.html.twig', [
    //         'contact_messages' => $contactMessagesRepository->findAll(),
    //     ]);
    // }

    // /**
    //  * @Route("/admin/contact/messages/new", name="contact_messages_new", methods={"GET","POST"})
    //  */
    // public function new(Request $request): Response
    // {
    //     $contactMessage = new ContactMessages();
    //     $form = $this->createForm(ContactMessagesType::class, $contactMessage);
    //     $form->handleRequest($request);

    //     if ($form->isSubmitted() && $form->isValid()) {
    //         $entityManager = $this->getDoctrine()->getManager();
    //         $entityManager->persist($contactMessage);
    //         $entityManager->flush();

    //         return $this->redirectToRoute('contact_messages_index');
    //     }

    //     return $this->render('contact_messages/new.html.twig', [
    //         'contact_message' => $contactMessage,
    //         'form' => $form->createView(),
    //     ]);
    // }

    // /**
    //  * @Route("/admin/contact/{id}", name="contact_messages_show", methods={"GET"})
    //  */
    // public function show(ContactMessages $contactMessage): Response
    // {
    //     return $this->render('contact_messages/show.html.twig', [
    //         'contact_message' => $contactMessage,
    //     ]);
    // }

    // /**
    //  * @Route("/admin/contact/{id}/edit", name="contact_messages_edit", methods={"GET","POST"})
    //  */
    // public function edit(Request $request, ContactMessages $contactMessage): Response
    // {
    //     $form = $this->createForm(ContactMessagesType::class, $contactMessage);
    //     $form->handleRequest($request);

    //     if ($form->isSubmitted() && $form->isValid()) {
    //         $this->getDoctrine()->getManager()->flush();

    //         return $this->redirectToRoute('contact_messages_index', [
    //             'id' => $contactMessage->getId(),
    //         ]);
    //     }

    //     return $this->render('contact_messages/edit.html.twig', [
    //         'contact_message' => $contactMessage,
    //         'form' => $form->createView(),
    //     ]);
    // }

    // /**
    //  * @Route("/admin/contact/messages/{id}", name="contact_messages_delete", methods={"DELETE"})
    //  */
    // public function delete(Request $request, ContactMessages $contactMessage): Response
    // {
    //     if ($this->isCsrfTokenValid('delete'.$contactMessage->getId(), $request->request->get('_token'))) {
    //         $entityManager = $this->getDoctrine()->getManager();
    //         $entityManager->remove($contactMessage);
    //         $entityManager->flush();
    //     }

    //     return $this->redirectToRoute('contact_messages_index');
    // }
}
