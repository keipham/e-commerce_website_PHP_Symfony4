<?php

namespace App\Controller;

use App\Entity\Formulas;
use App\Form\FormulasType;
use App\Repository\FormulasRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/formulas")
 */
class FormulasController extends AbstractController
{
    /**
     * @Route("/", name="formulas_index", methods={"GET"})
     */
    public function index(FormulasRepository $formulasRepository): Response
    {
        return $this->render('formulas/index.html.twig', [
            'formulas' => $formulasRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="formulas_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $formula = new Formulas();
        $form = $this->createForm(FormulasType::class, $formula);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($formula);
            $entityManager->flush();

            return $this->redirectToRoute('formulas_index');
        }

        return $this->render('formulas/new.html.twig', [
            'formula' => $formula,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="formulas_show", methods={"GET"})
     */
    public function show(Formulas $formula): Response
    {
        return $this->render('formulas/show.html.twig', [
            'formula' => $formula,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="formulas_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Formulas $formula): Response
    {
        $form = $this->createForm(FormulasType::class, $formula);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('formulas_index', [
                'id' => $formula->getId(),
            ]);
        }

        return $this->render('formulas/edit.html.twig', [
            'formula' => $formula,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="formulas_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Formulas $formula): Response
    {
        if ($this->isCsrfTokenValid('delete'.$formula->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($formula);
            $entityManager->flush();
        }

        return $this->redirectToRoute('formulas_index');
    }
}
