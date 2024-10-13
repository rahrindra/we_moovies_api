<?php

namespace App\Controller;

use App\Manager\TheMovieDBManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ApiMovieListController extends AbstractController
{
    #[Route('/api/movie/list', name: 'app_api_movie_list', methods: ['GET'])]
    public function index(TheMovieDBManager $theMovieDBManager): JsonResponse
    {
        $movieList = $theMovieDBManager->getTheMovieList();

        return new JsonResponse($movieList, Response::HTTP_OK);
    }
}
