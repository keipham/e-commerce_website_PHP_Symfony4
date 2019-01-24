<?php

namespace App\Controller;

use App\Entity\Games;
use App\Form\GamesType;
use App\Repository\GamesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

// /**
//  * @Route("/games")
//  */
class GamesController extends AbstractController
{
    /**
     * @Route("/games/", name="games_index", methods={"GET"})
     */
    public function indexUser(GamesRepository $gamesRepository): Response
    {
        return $this->render('games/index.html.twig', [
            'games' => $gamesRepository->findAll(),
        ]);
    }

    // /**
    //  * @Route("/admin/games/", name="admin_games_index", methods={"GET"})
    //  */
    // public function indexAdmin(GamesRepository $gamesRepository): Response
    // {
    //     return $this->render('games/index.html.twig', [
    //         'games' => $gamesRepository->findAll(),
    //     ]);
    // }

    // /**
    //  * @Route("/admin/games/new", name="admin_games_new", methods={"GET","POST"})
    //  */
    // public function new(Request $request): Response
    // {
    //     $game = new Games();
    //     $form = $this->createForm(GamesType::class, $game);
    //     $form->handleRequest($request);

    //     if ($form->isSubmitted() && $form->isValid()) {
    //         $entityManager = $this->getDoctrine()->getManager();
    //         $entityManager->persist($game);
    //         $entityManager->flush();

    //         return $this->redirectToRoute('games_index');
    //     }

    //     return $this->render('games/new.html.twig', [
    //         'game' => $game,
    //         'form' => $form->createView(),
    //     ]);
    // }

    /**
     * @Route("/games/{id}", name="games_show", methods={"GET"})
     */
    public function show(Games $game): Response
    {
        return $this->render('games/show.html.twig', [
            'game' => $game,
        ]);
    }

    // /**
    //  * @Route("/admin/games/{id}/edit", name="admin_games_edit", methods={"GET","POST"})
    //  */
    // public function edit(Request $request, Games $game): Response
    // {
    //     $form = $this->createForm(GamesType::class, $game);
    //     $form->handleRequest($request);

    //     if ($form->isSubmitted() && $form->isValid()) {
    //         $this->getDoctrine()->getManager()->flush();

    //         return $this->redirectToRoute('games_index', [
    //             'id' => $game->getId(),
    //         ]);
    //     }

    //     return $this->render('games/edit.html.twig', [
    //         'game' => $game,
    //         'form' => $form->createView(),
    //     ]);
    // }

//     /**
//      * @Route("/admin/games/{id}", name="admin_games_delete", methods={"DELETE"})
//      */
//     public function delete(Request $request, Games $game): Response
//     {
//         if ($this->isCsrfTokenValid('delete'.$game->getId(), $request->request->get('_token'))) {
//             $entityManager = $this->getDoctrine()->getManager();
//             $entityManager->remove($game);
//             $entityManager->flush();
//         }

//         return $this->redirectToRoute('games_index');
//     }
// }
