<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationType;

use App\Form\UserType;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserController extends AbstractController
{
    /**
     * @Route("/register", name="user_register")
     */
    public function register(Request $request, UserPasswordHasherInterface $passwordHasher)
    {
        $user = new User();

        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $user->setPassword($passwordHasher->hashPassword($user, $form->get('password')->getData()));
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();
            return $this->redirectToRoute('user_login');
        }
        $user = $this->getUser();
        if ($user) {
            return $this->redirectToRoute('home');
        } else {
            return $this->render('user/register.html.twig', [
                'form' => $form->createView()
            ]);
        }
    }
    /**
     * @Route("/login", name="user_login")
     */
    public function login()
    {
        $user = $this->getUser();
        if ($user) {
            return $this->redirectToRoute('home');
        } else {
            return $this->render('user/login.html.twig');
        }
    }
}
