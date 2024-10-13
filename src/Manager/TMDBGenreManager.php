<?php

namespace App\Manager;

use App\Client\TheMovieDBClient;

class TMDBGenreManager
{
    public function __construct(
        private readonly TheMovieDBClient $theMovieDBClient,
    ) {}

    public function getGenreList(): array
    {
        $theMovieList = $this->theMovieDBClient->fetchGenreList();
        return $theMovieList;

    }
}