<?php

namespace App\DataFixtures;

use App\Entity\Formulas;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class FormulasFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
    //FORMULA FOR 1 GAME
        $formula = new Formulas();
        $formula->setName("Basique")
                ->setDescription("Passez un bon moment entre collègues, amis et famille ! Avec la formule basique, vous pouvez choisir 1 jeu parmi notre selection! ")
                ->setNbOfGame(1)
                ->setPrice(700)
                ->setPicture("basique.jpeg");

        $manager->persist($formula);

        //FORMULA FOR 2 GAMES
        $formula1 = new Formulas();
        $formula1->setName("Duo")
                ->setDescription("La formule Duo vous permets de choisir 2 jeux pour vous éclatez entre amis, famille et collègues !")
                ->setNbOfGame(2)
                ->setPrice(1200)
                ->setPicture("duo.jpeg");

        $manager->persist($formula1);

        //FORMULA FOR 3 GAMES

        $formula2 = new Formulas();
        $formula2->setName("Trio")
                ->setDescription("Vous êtes nombreux ? Vous voulez plus de choix ? Optez pour la formule Trio ! Choisissez 3 jeux parmi notre sélection de jeu!")
                ->setNbOfGame(3)
                ->setPrice(1900)
                ->setPicture("trio.jpeg");

        $manager->persist($formula2);

        //FORMULA FOR 4 GAMES

        $formula3 = new Formulas();
        $formula3->setName("La totale")
                ->setDescription("Vous hésitez ! N'hésitez plus, passez le cap ! Pourquoi se limiter à 1, 2 ou 3 jeux alors que la possibilité vous est offerte de jouer aux 4 pour votre plus grand bonheur !")
                ->setNbOfGame(4)
                ->setPrice(2500)
                ->setPicture("totale.jpeg");

        $manager->persist($formula3);

        $manager->flush();
        
    }
}
