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
     * @Route("/{id}", name="formulas_show", methods={"GET"})
     */
    public function showFormula(Formulas $formula): Response
    {
        return $this->render('formulas/show.html.twig', [
            'formula' => $formula,
        ]);
    }
}
