<?php

namespace App\Controller;

use App\Entity\Users;
use App\Entity\Bookings;
use App\Form\BookingsType;
use App\Repository\BookingsRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * @Route("/bookings")
 */
class BookingsController extends AbstractController
{
    /**
     * @Route("/calendar/{id}", name="calendar", methods={"GET"})
     */
    public function calendar(Users $user): Response
    {
        $calendar = new Bookings($user);
        $form = $calendar->showCalendar();
        return $this->render('calendrier.html.twig', [
            'calendar' => $form,
            'user' => $user,
        ]);
    }

    //  /**
    //  * @Route("/{id}/{year}/{month}/{day}", name="book", methods={"GET"})
    //  */
    // public function bookingForm(Users $user, $year, $month, $day): Response
    // {
    //     $booking = new Bookings($user);
    //     $form = $this->createForm(BookingsType::class, $booking);
    //     // $form->handleRequest($request);
    //     return $this->render('bookings/new.html.twig', [
    //         'booking' => $booking,
    //         'form' => $form->createView(),
    //         'year' => $year,
    //         'month' => $month,
    //         'day' => $day,
    //     ]);
    // }

    /**
     * @Route("/", name="bookings_index", methods={"GET"})
     */
    public function index(BookingsRepository $bookingsRepository): Response
    {
        return $this->render('bookings/index.html.twig', [
            'bookings' => $bookingsRepository->findAll(),
        ]);
    }

    /**
     * @Route("/{id}/{year}/{month}/{day}/new", name="bookings_new", methods={"GET","POST"})
     */
    public function new(Request $request, Users $user, $year, $month, $day): Response
    {
        $booking = new Bookings($user);
        $form = $this->createForm(BookingsType::class, $booking);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $booking->setStatus('Reserved');
            // $booking->setBeginAt($year-$month-$day);
            // $booking->setEndAt($year-$month-$day);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($booking);
            $entityManager->flush();

            return $this->redirectToRoute('bookings_index');
        }

        return $this->render('bookings/new.html.twig', [
            'booking' => $booking,
            'form' => $form->createView(),
            'id' => $user->getId(),
            'year' => $year,
            'month' => $month,
            'day' => $day,
        ]);

    }

    /**
     * @Route("/{id}", name="bookings_show", methods={"GET"})
     */
    public function show(Bookings $booking): Response
    {
        return $this->render('bookings/show.html.twig', [
            'booking' => $booking,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="bookings_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Bookings $booking): Response
    {
        $form = $this->createForm(BookingsType::class, $booking);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('bookings_index', [
                'id' => $booking->getId(),
            ]);
        }

        return $this->render('bookings/edit.html.twig', [
            'booking' => $booking,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="bookings_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Bookings $booking): Response
    {
        if ($this->isCsrfTokenValid('delete'.$booking->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($booking);
            $entityManager->flush();
        }

        return $this->redirectToRoute('bookings_index');
    }


   
}
