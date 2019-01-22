<?php

namespace App\DataFixtures;

use App\Entity\Games;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class GamesFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $game = new Games();
        $game->setName("Jumanji")
            ->setDescription("Vous êtes dans la merde. Vous avez commandé un jeu chez NetEscape en pensant passer une soirée pépouse avec vos copains et votre vieux chat. Mais tout ne se passe pas comme prévu, la boite vous a aspiré à l’intérieur du jeu, et vous vous retrouvez dans une jungle hostile pleine d’animaux sauvages. A peine le temps de reprendre vos émotions qu’un cri strident fend l’air suivi d’un vol d’oiseaux effrayés. Vous comprenez vite qu’il faut se tirer. Bref, vous êtes dans le caca. ")
            ->setDuration(90)
            ->setPlayerMin(2)
            ->setPlayerMax(6)
            ->setPicture("/src/images/jumanji.jpeg");
        
        $manager->persist($game);

            $game1 = new Games();
            $game1->setName("Voodoo")
                ->setDescription("Vous êtes dans la merde. Vous pensiez passer une soirée pépouze chez une personne que vous avez rencontré dans un bar avec vos amis. Mais en vous réveillant chez la personne, vous vous rendez compte que vous êtes enfermé et qu’il y a, disséminé dans la pièce, pleins d’objets pour faire des rituels. Oh mon dieu, vous les sacrifices d’un rituel vaudou. Vous devez absolument vous échapper avant qu’il ne revienne.")
                ->setDuration(100)
                ->setPlayerMin(2)
                ->setPlayerMax(6)
                ->setPicture("/src/images/vaudou.jpg");

        $manager->persist($game1);

        $game2 = new Games();
        $game2->setName("Assassin")
            ->setDescription("Il y a des siècles, cet ordre mettait la main sur un trésor légendaire et inestimable. Plusieurs sources affirment que le Cardinal Lemoine aurait été en possession de ce trésor avant que ce dernier ne tombe dans l’oubli… La confrérie des Assassins souhaite s’en emparer et vous missionne pour retrouver sa trace. Votre quête débutera chez un descendant du Cardinal Lemoine et nul ne sait où elle vous mènera. Tout sera permis pour votre équipe d’assassins… y compris explorer le passé !")
            ->setDuration(60)
            ->setPlayerMin(2)
            ->setPlayerMax(6)
            ->setPicture("/src/images/assassins.jpg");

        $manager->persist($game2);
        
        $game3 = new Games();
        $game3->setName("The cabin")
            ->setDescription("Une légende perdure depuis longtemps dans la région de Blackville au canada. On raconte que quelque chose rôde dans la forêt. On pourrait, selon les dires, l’entendre crier dans la nuit.
            Vous et vos compagnons avez décidé de vous y aventurer. Après quelques heures de marche dans cette forêt brumeuse, vous entendez des cris et commencez à sentir une présence. Plus la nuit tombe, plus la présence est réelle, vous vous sentez traqués.
            Vous rejoignez une cabane abandonnée pour vous y réfugier, vous rentrez et barricadez la porte afin de tenir ce qui vous chasse à distance.
            A peine le temps de jeter un coup d’œil autour de vous pour vous rendre compte qu’au final, vous seriez peut-être plus en sécurité à l’extérieur.
            Trouvez un moyen de fuir afin de sauver vos vies.")
            ->setDuration(75)
            ->setPlayerMin(2)
            ->setPlayerMax(6)
            ->setPicture("/src/images/cabin-in-the-woods.jpg");

        $manager->persist($game3);
        

        $manager->flush();
    }
}
