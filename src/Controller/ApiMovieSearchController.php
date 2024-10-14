<?php

namespace App\Controller;

use App\Manager\MovieSearchManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ApiMovieSearchController extends AbstractController
{
    #[Route('/api/movie/search', name: 'app_api_movie_search', methods: ['POST'])]
    public function index(RequestStack $requestStack, MovieSearchManager $searchManager): JsonResponse
    {
        $userData = $requestStack->getCurrentRequest()?->getContent();
        $movies = $searchManager->searchMovie(json_decode($userData, true));

        return new JsonResponse($movies, Response::HTTP_OK);
    }
}
