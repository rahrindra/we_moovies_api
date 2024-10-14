<?php

namespace App\Manager;

use App\Client\TheMovieDBClient;

abstract class AbstractTMDBManager
{
    public function __construct(
        protected readonly TheMovieDBClient $theMovieDBClient,
    ) {
    }
}
