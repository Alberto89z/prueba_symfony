<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RegisterUserController extends AbstractController
{
    #[Route('/register/user', name: 'app_register_user')]
    public function index(): Response
    {
        $user = new User();
        $form = $this->createForm(UserType::class,$user);
        return $this->render('register_user/index.html.twig', [
            'controller_name' => 'RegisterUserController',
            'miVariable' => 'Hola mundo desde symfony',
            'formulario' => $form->createView(),
        ]);
    }
}
