<?php

namespace App\Controller;

use App\Repository\MovieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MovieController extends AbstractController
{
    #[Route('/', name: 'app_moovies')]
    public function index(MovieRepository $mooviesRepository): Response
    {
        $moovies = $mooviesRepository->findAll();

        return $this->render('moovies/index.html.twig', [
            'moovies' => $moovies,
        ]);
    }
}
