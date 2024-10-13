<?php

namespace App\Controller;

use App\Manager\TheMovieDBManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

class ApiMovieListController extends AbstractController
{
    #[Route('/api/movie/list', name: 'app_api_movie_list', methods: ['GET'])]
    public function index(TheMovieDBManager $theMovieDBManager): JsonResponse
    {
        $moovieList = $theMovieDBManager->getTheMovieList();

        return new JsonResponse($moovieList, 200);
    }
}
