<?php

namespace App\Controller;

use App\Entity\Games;
use App\Entity\Users;
use App\Entity\ContactMessages;
use App\Form\GamesType;
use App\Form\UsersType;
use App\Form\ContactMessagesType;
use App\Form\AnswerContactMessageType;
use App\Entity\Formulas;
use App\Form\FormulasType;
use App\Repository\GamesRepository;
use App\Repository\UsersRepository;
use App\Repository\BookingsRepository;
use App\Repository\FormulasRepository;
use App\Repository\ContactMessagesRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * @Route("/admin")
 */
class AdminController extends AbstractController
{
    //________________________USERS RELATED_____________________________________________________________________________
    //__________________________________________________________________________________________________________________

    /**
     * @Route("/users", name="admin_users_index", methods={"GET"})
     */
    public function indexUsers(UsersRepository $usersRepository): Response
    {
        return $this->render('users/index.html.twig', [
            'users' => $usersRepository->findAll(),
        ]);
    }

    /**
     * @Route("/users/new", name="admin_users_new", methods={"GET","POST"})
     */
    public function newUser(Request $request, UserPasswordEncoderInterface $encoder): Response
    {
        $user = new Users();
        $form = $this->createForm(UsersType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $encoded = $encoder->encodePassword($user, $user->getPassword()); //crypter le password
            $user->setPassword($encoded); //password crypté à mettre dans la table
            $entityManager->persist($user);
            $entityManager->flush();

            return $this->redirectToRoute('admin_users_index');
        }

        return $this->render('users/new.html.twig', [
            'user' => $user,
            'form' => $form->createView(),
        ]);
    }
    //________________________GAMES RELATED_____________________________________________________________________________
    //__________________________________________________________________________________________________________________

    /**
     * @Route("/games", name="admin_games_index", methods={"GET"})
     */
    public function indexGames(GamesRepository $gamesRepository): Response
    {
        return $this->render('games/index.html.twig', [
            'games' => $gamesRepository->findAll(),
        ]);
    }

     /**
     * @Route("/games/new", name="admin_games_new", methods={"GET","POST"})
     */
    public function newGame(Request $request): Response
    {
        $game = new Games();
        $form = $this->createForm(GamesType::class, $game);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($game);
            $entityManager->flush();

            return $this->redirectToRoute('admin_games_index', [
                'id' => $game->getId(),
            ]);
        }

        return $this->render('games/new.html.twig', [
            'game' => $game,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/games/{id}/edit", name="admin_games_edit", methods={"GET","POST"})
     */
    public function editGame(Request $request, Games $game): Response
    {
        $form = $this->createForm(GamesType::class, $game);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('games_index', [
                'id' => $game->getId(),
            ]);
        }

        return $this->render('games/edit.html.twig', [
            'game' => $game,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/games/{id}", name="admin_games_delete", methods={"DELETE"})
     */
    public function deleteGame(Request $request, Games $game): Response
    {
        if ($this->isCsrfTokenValid('delete'.$game->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($game);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_games_index');
    }

        /**
     * @Route("/games/{id}", name="admin_games_show", methods={"GET"})
     */
    public function show(Games $game): Response
    {
        return $this->render('games/show.html.twig', [
            'game' => $game,
        ]);
    }

    //________________________FORMULAS RELATED_____________________________________________________________________________
    //_____________________________________________________________________________________________________________________

    /**
     * @Route("/formulas", name="admin_formulas_index", methods={"GET"})
     */
    public function indexFormulas(FormulasRepository $formulasRepository): Response
    {
        return $this->render('formulas/admin/index.html.twig', [
            'formulas' => $formulasRepository->findAll(),
        ]);
    }
     /**
     * @Route("/formulas/admin/new", name="admin_formulas_new", methods={"GET","POST"})
     */
    public function newFormula(Request $request): Response
    {
        $formula = new Formulas();
        $form = $this->createForm(FormulasType::class, $formula);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($formula);
            $entityManager->flush();

            return $this->redirectToRoute('admin_formulas_index');
        }

        return $this->render('/formulas/admin/new.html.twig', [
            'formula' => $formula,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/formulas/admin/{id}/edit", name="admin_formulas_edit", methods={"GET","POST"})
     */
    public function editFormula(Request $request, Formulas $formula): Response
    {
        $form = $this->createForm(FormulasType::class, $formula);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_formulas_index', [
                'id' => $formula->getId(),
            ]);
        }

        return $this->render('/formulas/admin/edit.html.twig', [
            'formula' => $formula,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/formulas/admin/{id}", name="admin_formulas_delete", methods={"DELETE"})
     */
    public function deleteFormula(Request $request, Formulas $formula): Response
    {
        if ($this->isCsrfTokenValid('delete'.$formula->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($formula);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_formulas_index');
    }

       /**
     * @Route("/formulas/admin/{id}", name="aformulas_show", methods={"GET"})
     */
    public function ashowFormula(Formulas $formula): Response
    {
        return $this->render('formulas/admin/show.html.twig', [
            'formula' => $formula,
        ]);
    }

    //________________________BOOKINGS RELATED_____________________________________________________________________________
    //_____________________________________________________________________________________________________________________

    /**
     * @Route("/bookings/index", name="admin_bookings_index", methods={"GET"})
     */
    public function indexBookings(BookingsRepository $bookingsRepository): Response
    {
        return $this->render('bookings/index.html.twig', [
            'bookings' => $bookingsRepository->findAll(),
        ]);
    }

    //________________________CONTACT MESSAGES RELATED_____________________________________________________________________________
    //_____________________________________________________________________________________________________________________

    /**
     * @Route("/contacts", name="admin_contact_index", methods={"GET"})
     */
    public function indexContacts(ContactMessagesRepository $contactMessagesRepository): Response
    {
        return $this->render('admin_contact_messages/index.html.twig', [
            'contact_messages' => $contactMessagesRepository->findAll(),
        ]);
    }

    /**
     * @Route("/contacts/new", name="admin_contact_new", methods={"GET","POST"})
     */
    public function newContact(Request $request): Response
    {
        $contactMessage = new ContactMessages();
        $form = $this->createForm(ContactMessagesType::class, $contactMessage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($contactMessage);
            $entityManager->flush();

            return $this->redirectToRoute('admin_contact_index');
        }

        return $this->render('admin_contact_messages/new.html.twig', [
            'contact_message' => $contactMessage,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/contacts/{id}", name="admin_contact_show", methods={"GET"})
     */
    public function showContact(ContactMessages $contactMessage): Response
    {
        return $this->render('admin_contact_messages/show.html.twig', [
            'contact_message' => $contactMessage,
        ]);
    }

    /**
     * @Route("/contacts/{id}/edit", name="admin_contact_edit", methods={"GET","POST"})
     */
    public function editContact(Request $request, ContactMessages $contactMessage): Response
    {
        $form = $this->createForm(ContactMessagesType::class, $contactMessage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_contact_index', [
                'id' => $contactMessage->getId(),
            ]);
        }

        return $this->render('admin_contact_messages/edit.html.twig', [
            'contact_message' => $contactMessage,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/contacts/{id}", name="admin_contact_delete", methods={"DELETE"})
     */
    public function deleteContact(Request $request, ContactMessages $contactMessage): Response
    {
        if ($this->isCsrfTokenValid('delete'.$contactMessage->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($contactMessage);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_contact_index');
    }


    /**
     * @Route("/contacts/answer/{id}", name="admin_contact_answer")
     */
    public function AnswerToCustomer(Request $request, $id, \Swift_Mailer $mailer, ContactMessagesRepository $contactRepo)
    {
        $contactMessage = $contactRepo->findContactbyId($id);// find info about the customer's demand
        $form = $this->createForm(AnswerContactMessageType::class, $contactMessage);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) 
        {
            $contactMessage->setStatus('répondu');
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->flush();

            $messageToCustomer= (new \Swift_Message('NetEscape : Réponse à votre email'))
            ->setFrom('projetnetescape@gmail.com')
            ->setTo($contactMessage->getEmail())
            ->setBody(
                $this->renderView(
                    '/admin_contact_messages/answerToCustomer.html.twig',
                    ['name' => $contactMessage->getUsername(),
                    'body' => $contactMessage->getAnswerToCustomer()
                    ]
                ),'text/html');

            $mailer->send($messageToCustomer);
            
            return $this->redirectToRoute('admin_contact_index');
        }

        return $this->render('/admin_contact_messages/answerForm.html.twig', [
            'form' => $form->createView(),
            'username' => $contactMessage->getUsername(),
            'email'=> $contactMessage->getEmail()
        ]);
    
    }

}