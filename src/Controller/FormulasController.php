<?php

namespace App\Controller;

use App\Entity\Formulas;
use App\Form\FormulasType;
use App\Repository\CommentsRepository;
use App\Repository\FormulasRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

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
        return $this->render('formulas/users/index.html.twig', [
            'formulas' => $formulasRepository->findAll(),
        ]);
    }

   /**
     * @Route("/{id}", name="formulas_show", methods={"GET"})
     */
    public function showFormula(Formulas $formula): Response
    {
        return $this->render('formulas/users/show.html.twig', [
            'formula' => $formula,
        ]);
    }

       /**
     * @Route("/{id}/comments", name="formulas_comment", methods={"GET"})
     */
    public function showFormulaComment(Formulas $formula, CommentsRepository $commentsRepository): Response
    {
        $assessment = $commentsRepository->findOverallRating($formula->getName());
        $sum = 0;
        $div = 0;
        foreach ($assessment as $assess){
            $div += 1;
            // var_dump($assess["overallRating"]);
            if ($assess["overallRating"] != null){
                $sum += $assess["overallRating"];
            }
        }
        // dump($sum/$div);
        if ($div != 0){
            $abc = $sum/$div;
        } else if ($div == 1){
            $abc = $sum;
        } else {
            $abc = 0;
        }
        
        return $this->render('comments/formulaComments.html.twig', [
            'comments' => $commentsRepository->findAllByFormulaName($formula->getName()),
            'formulaName' => $formula->getName(),
            'assessment' => $abc,
            'nbrComment' => $div
        ]);
    }

}
