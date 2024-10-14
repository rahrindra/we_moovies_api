<?php

namespace App\Manager;

class MovieDetailsManager extends AbstractTMDBManager
{

    public function getMovieDetails(int $movieId): array
    {
        return $this->theMovieDBClient->getMovieDetails($movieId);
    }

}