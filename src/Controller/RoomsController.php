<?php

namespace App\Controller;

use App\Repository\MooviesRepository;
use App\Repository\RoomsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RoomsController extends AbstractController
{
    #[Route('/rooms', name: 'app_rooms')]
    public function index(): Response
    {
        return $this->render('rooms/index.html.twig', [
            'controller_name' => 'RoomsController',
        ]);
    }

    #[Route('/rooms/add/{id}')]
    public function addRoom (int $id, MooviesRepository $mooviesRepository, RoomsRepository $roomsRepository)
    {
        $movie = $mooviesRepository->find($id);
        dd($movie->getRooms()->getMoovies());
    }
}
