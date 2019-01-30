<?php

namespace App\Controller;

use App\Entity\Bookings;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/bookings")
 */
class BookingsController extends AbstractController
{
/**
     * @Route("/", name="calendar", methods={"GET"})
     */
    public function calendar(): Response
    {
        $calendar = new Bookings();
        $form = $calendar->show();
        return $this->render('calendrier.html.twig', [
            'calendar' => $form,
        ]);
    }

    /**
     * @Route("/{year}/{month}/{day}", name="book", methods={"GET"})
     */
    public function bookingForm($year, $month, $day): Response
    {
        printf($year); 
        printf($month) ;
        printf($day);
        return "ok";
        // return $this->render('calendrier.html.twig', [
        //     'calendar' => $form,
        // ]);
    }
}