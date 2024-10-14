<?php

namespace App\Manager;

use App\Client\TheMovieDBClient;

class TMDBGenreManager extends AbstractTMDBManager
{
    public function getGenreList(): array
    {
        $theMovieList = $this->theMovieDBClient->fetchGenreList();
        return $theMovieList;

    }
}