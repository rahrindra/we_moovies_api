<?php

namespace App\Client;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class TheMovieDBClient
{
    private string $apiEndPoint;
    private string $accessToken;

    public function __construct(
        private HttpClientInterface $client,
    ) {
        $this->apiEndPoint      = $_ENV['TMDB_API_END_POINT'];
        $this->accessToken      = $_ENV['TMDB_ACCESS_TOKEN'];
    }

    /**
     * @description recupère la liste des films populaires
     * @return array
     */
    public function fetchMostPopularMovies(): array
    {
        $response = $this->client->request(
            'GET',
            $this->apiEndPoint . 'discover/movie',
            $this->getDefaultParams()
        );

        return $response->toArray();
    }

    /**
     * @description recupère la liste des categories de film
     * @return array
     */
    public function fetchGenreList(): array
    {
        $response = $this->client->request(
            'GET',
            $this->apiEndPoint . 'genre/movie/list',
            $this->getDefaultParams()
        );

        return $response->toArray();
    }

    private function getDefaultQuery(): array
    {
        return [
            "language"      => "fr",
            "include_adult" => false,
        ];
    }
    
    private function getDefaultHeaders(): array
    {
        return [
            'Authorization' => 'Bearer ' . $this->accessToken,
        ];   
    }
    
    private function getDefaultParams(): array
    {
        return [
            "query"   => $this->getDefaultQuery(),
            "headers" => $this->getDefaultHeaders()
        ];
    }
}