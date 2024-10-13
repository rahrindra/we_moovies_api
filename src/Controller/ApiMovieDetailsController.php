<?php

namespace App\Controller;

use App\Manager\MovieDetailsManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ApiMovieDetailsController extends AbstractController
{
    #[Route('/api/movie/details/{id}', name: 'app_api_movie_details', methods: ['GET'])]
    public function index(MovieDetailsManager $movieDetailsManager, int $id): JsonResponse
    {
        $movieDetails = $movieDetailsManager->getMovieDetails($id);

        return new JsonResponse($movieDetails, Response::HTTP_OK);
    }
}
