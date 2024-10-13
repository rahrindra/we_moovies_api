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
        $this->apiEndPoint = $_ENV['TMDB_API_END_POINT'];
        $this->accessToken      = $_ENV['TMDB_ACCESS_TOKEN'];
    }

    public function fetchMostPopularMovies(): array
    {
        $params = [
            "query" => $this->getQuery(),
            "headers" => $this->getHeaders()
        ];

        $response = $this->client->request(
            'GET',
            $this->apiEndPoint . 'discover/movie',
            $params
        );

        return $response->toArray();
    }

    private function getQuery(): array
    {
        return [
            "language"      => "fr",
            "include_adult" => false,
        ];
    }
    
    private function getHeaders(): array
    {
        return [
            'Authorization' => 'Bearer ' . $this->accessToken,
        ];   
    }
}