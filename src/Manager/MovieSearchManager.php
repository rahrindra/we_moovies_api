<?php

namespace App\Manager;

class MovieSearchManager extends AbstractTMDBManager
{

    public function searchMovie(array $params): array
    {
        $keyword = $params['keyword'] ?? '';
        return $this->theMovieDBClient->searchMovie($keyword);
    }
}