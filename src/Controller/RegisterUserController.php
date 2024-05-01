<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

class RegisterUserController extends AbstractController
{
    #[Route('/register/user', name: 'app_register_user')]
    public function index(Request $request, UserPasswordHasherInterface $encoder): Response
    {
        $user = new User();
        $form = $this->createForm(UserType::class,$user);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
            $en = $this->getDoctrine()->getManager();
            $user->setPassword($encoder->hashPassword($user, $form['password']->getData()));
            $user->setRoles(['ROLE_USER']);
            $user->setIsActive(True);
            $en->persist($user);
            $en->flush();
            $this->addFlash('exito','Se ha regisrado exitosamente');
            return $this->redirectToRoute('app_register_user');
        }
        return $this->render('register_user/index.html.twig', [
            'controller_name' => 'RegisterUserController',
            'miVariable' => 'Hola mundo desde symfony',
            'formulario' => $form->createView(),
        ]);
    }
}
