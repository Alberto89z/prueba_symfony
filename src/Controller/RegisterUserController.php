<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

class RegisterUserController extends AbstractController
{
    #[Route('/register/user', name: 'app_register_user')]
    public function index(Request $request, UserPasswordHasherInterface $encoder, EntityManagerInterface $entityManagerInterface): Response
    {
        $user = new User();

        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);
        echo "Se inica el formulario";

        if ($form->isSubmitted() && $form->isValid()) {
            $user = $form->getData();
            $user->setPassword($encoder->hashPassword($user, $form['password']->getData()));
            $user->setRoles(['ROLE_USER']);
            $user->setIsActive(True);
            $entityManagerInterface->persist($user);
            $entityManagerInterface->flush();
            $this->addFlash('exito', 'Se ha registrado exitosamente');
            return $this->redirectToRoute('app_prueba');
        }

        return $this->render('register_user/index.html.twig', [
            'controller_name' => 'RegisterUserController',
            'miVariable' => 'Hola mundo desde symfony',
            'form' => $form->createView()
        ]);
    }
}
