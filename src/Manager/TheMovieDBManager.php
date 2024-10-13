<?php

namespace App\Manager;

use App\Client\TheMovieDBClient;

class TheMovieDBManager
{
    public function __construct(
        private readonly TheMovieDBClient $theMovieDBClient,
    ) {}

    public function getTheMovieList(): array
    {
        $theMovieList = $this->theMovieDBClient->fetchMostPopularMovies();
        return $theMovieList;
    }
}