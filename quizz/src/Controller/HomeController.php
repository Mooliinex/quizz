<?php

namespace App\Controller;

use App\Entity\Categorie;
use App\Repository\CategorieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'homepage')]
    public function index(CategorieRepository $categorieRepository): Response
    {
        $categories = $categorieRepository->findAll();
//        dd($categorie);


//        $categorie = $this->getDoctrine()->getRepository(Categorie::class)->findAll();
//        dd($categorie);

        return $this->render('home/index.html.twig', [
            'categories' => $categories,
        ]);
    }
}
