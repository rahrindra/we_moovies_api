<?php

namespace App\Controller;

use App\Manager\TMDBGenreManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ApiGenreListController extends AbstractController
{
    #[Route('/api/genre/list', name: 'app_api_genre_list', methods: ['GET'])]
    public function index(TMDBGenreManager $genreManager): JsonResponse
    {
        $genreList = $genreManager->getGenreList();

        return new JsonResponse($genreList, Response::HTTP_OK);
    }
}
