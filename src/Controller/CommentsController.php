<?php

namespace App\Controller;

use App\Entity\Users;
use App\Entity\Comments;
use App\Form\CommentsType;
use App\Repository\CommentsRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/comments")
 */
class CommentsController extends AbstractController
{
    /**
     * @Route("/{id}/index", name="comments_index", methods={"GET"})
     */
    public function index(CommentsRepository $commentsRepository, Users $user): Response
    {
        return $this->render('comments/indexComment.html.twig', [
            'comments' => $commentsRepository->findAllById($user->getId()),
        ]);
    }

//     /**
//     * @Route("/{id}/feedback", name="feedback")
//     */
//    public function feedback(Comments $comment){
       
//     return $this->render('comments/commentForm.html.twig', [
//         'comment' => $comment
//     ]);
//     }

    /**
     * @Route("/{id}/{user}/new", name="comments_new", methods={"GET","POST"})
     */
    public function new(Request $request, Comments $comment, Users $user): Response
    {
        $form = $this->createForm(CommentsType::class, $comment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // if ($comment->getJumanji() == "NA"){
            //     $comment->setJumanji(null);
            // }  
            // if ($comment->getVoodoo() == "NA"){
            //     $comment->setJumanji(null);
            // }   
            // if ($comment->getAssassin() == "NA"){
            //     $comment->setJumanji(null);
            // }   
            // if ($comment->getTheCabin() == "NA"){
            //     $comment->setJumanji(null);
            // }     
            $comment->setFeedback(true);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($comment);
            $entityManager->flush();
            $this->addFlash('success', 'Merci pour votre commentaire ! Nous espérons vous revoir bientôt !');
            return $this->redirectToRoute('comments_index', [
                'id' => $user->getId()
            ]);
        }
        return $this->render('comments/new.html.twig', [
            'comment' => $comment,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="comments_show", methods={"GET"})
     */
    public function show(Comments $comment): Response
    {
        return $this->render('comments/show.html.twig', [
            'comment' => $comment,
        ]);
    }

    /**
     * @Route("/{id}/{user}/edit", name="comments_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Comments $comment, Users $user): Response
    {
        $form = $this->createForm(CommentsType::class, $comment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('comments_index', [
                'id' => $user->getId(),
            ]);
        }

        return $this->render('comments/edit.html.twig', [
            'comment' => $comment,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}/{user}", name="comments_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Comments $comment, Users $user): Response
    {
        if ($this->isCsrfTokenValid('delete'.$comment->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($comment);
            $entityManager->flush();
        }

        return $this->redirectToRoute('comments_index', [
            'id' => $user->getId()
        ]);
    }
}
