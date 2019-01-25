<?php

namespace App\Controller;

use App\Entity\Games;
use App\Entity\Users;
use App\Form\GamesType;
use App\Repository\GamesRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\User\User;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/games")
 */
class GamesController extends AbstractController
{
    /**
     * @Route("/games/", name="games_index", methods={"GET"})
     */
    public function indexUser(GamesRepository $gamesRepository): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN', null, 'Unable to access this page!');
        return $this->render('index.html.twig', [
            'games' => $gamesRepository->findAll(),
        ]);
    }


    /**
     * @Route("/games/{id}", name="games_show", methods={"GET"})
     */
    public function show(Games $game): Response
    {
        return $this->render('show.html.twig', [
            'game' => $game,
        ]);
    }

}