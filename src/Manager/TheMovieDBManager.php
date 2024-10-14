<?php

namespace App\Manager;

use App\Client\TheMovieDBClient;

class TheMovieDBManager extends AbstractTMDBManager
{
    public function getTheMovieList(): array
    {
        $theMovieList = $this->theMovieDBClient->fetchMostPopularMovies();
        return $theMovieList;
    }
}