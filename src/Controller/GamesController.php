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
     * @Route("/", name="games_index", methods={"GET"})
     */
    public function index(GamesRepository $gamesRepository): Response
    {
        return $this->render('index.html.twig', [
            'games' => $gamesRepository->findAll(),
        ]);
    }


    /**
     * @Route("/{id}", name="games_show", methods={"GET"})
     */
    public function show(Games $game): Response
    {
        return $this->render('games/show.html.twig', [
            'game' => $game,
        ]);
    }

    /**
     * @Route("/display/{id}", name="games_show_users", methods={"GET"})
     */
    public function showUser(Games $game): Response
    {
        return $this->render('games/showUser.html.twig', [
            'game' => $game,
        ]);
    }

}