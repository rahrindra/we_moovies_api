<?php

namespace App\Client;

interface TMDBClientInterface
{
    /**
     * @description recupère la liste des films populaires
     * @return array
     */
    public function fetchMostPopularMovies(): array;

    /**
     * @description recupère la liste des categories de film
     * @return array
     */
    public function fetchGenreList(): array;

    /**
     * @description recupère les détails d'un film
     * @return array
     */
    public function getMovieDetails(int $movieId): array;

    /**
     * @description recherche des films
     * @return array
     */
    public function searchMovie(string $keyword): array;

}