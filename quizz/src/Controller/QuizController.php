<?php

namespace App\Controller;

use App\Entity\Question;
use App\Entity\Reponse;
use App\Entity\User;
use App\Form\UserType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


class QuizController extends AbstractController
{
    /**
     * @Route("/my_quiz", name="my_quiz")
     */
    public function index(): Response
    {
        return $this->render('quiz/index.html.twig');
    }

    /**
     * @Route("/quizz", name="home")
     */
    public function home()
    {
        $repo = $this->getDoctrine()->getRepository(Question::class);

        $quizs = $repo->findAll();

        return $this->render('quiz/index.html.twig',[
            'quizs' => $quizs
        ]);
    }




}
