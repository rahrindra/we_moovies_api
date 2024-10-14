<?php

namespace App\Manager;

use App\Client\TheMovieDBClient;

class MovieSearchManager
{
    public function __construct(
        private readonly TheMovieDBClient $theMovieDBClient,
    ) {}

    public function searchMovie(array $params): array
    {
        $keyword = $params['keyword'] ?? '';
        return $this->theMovieDBClient->searchMovie($keyword);
    }
}