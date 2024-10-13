<?php

namespace App\Manager;

use App\Client\TheMovieDBClient;

class MovieDetailsManager
{
    public function __construct(
        private readonly TheMovieDBClient $theMovieDBClient,
    ) {}

    public function getMovieDetails(int $movieId): array
    {
        return $this->theMovieDBClient->getMovieDetails($movieId);
    }

}