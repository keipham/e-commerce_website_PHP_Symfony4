<?php

namespace App\Controller;

use App\Entity\Users;
use App\Form\UsersType;
use App\Entity\Bookings;
use App\Repository\UsersRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * @Route("/users")
 */
class UsersController extends AbstractController
{
    /**
     * @Route("/{id}", name="users_show", methods={"GET"})
     */
    public function show(Users $user): Response
    {
        return $this->render('users/show.html.twig', [
            'user' => $user,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="users_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Users $user,UserPasswordEncoderInterface $encoder): Response
    {
        $form = $this->createForm(UsersType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $encoded = $encoder->encodePassword($user, $user->getPassword()); //crypter le password
            $user->setPassword($encoded); //password crypté à mettre dans la table
            $entityManager->persist($user);
            $entityManager->flush();
            $mon_role=$user->getRoles();

            if($mon_role[0]=="ROLE_ADMIN") {
                return $this->redirectToRoute('admin_users_index', [
                    'id' => $user->getId(),
                ]);
            }

            else if ($mon_role[0]=="ROLE_USER") {
                return $this->redirectToRoute('users_show', [
                    'id' => $user->getId(),
                ]);
            }
        }

        return $this->render('users/edit.html.twig', [
            'user' => $user,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="users_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Users $user): Response
    {
        if ($this->isCsrfTokenValid('delete'.$user->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($user);
            $entityManager->flush();
        }

        return $this->redirectToRoute('admin_users_index');
    }

    
}
