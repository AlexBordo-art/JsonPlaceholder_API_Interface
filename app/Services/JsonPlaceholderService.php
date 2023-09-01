<?php

namespace App\Services;

use GuzzleHttp\Client;

class JsonPlaceholderService
{
    protected Client $client;
    protected string $base_url_api = "https://jsonplaceholder.typicode.com";

    public function __construct()
    {
        $this->client = new Client(['base_uri' => $this->base_url_api]);
    }

    public function getUsers(): array
    {
        $response = $this->client->get('/users');
        return json_decode($response->getBody(), true);
    }

    public function getPosts(): array
    {
        $response = $this->client->get('/posts');
        return json_decode($response->getBody(), true);
    }

    public function getTodos(): array
    {
        $response = $this->client->get('/todos');
        return json_decode($response->getBody(), true);
    }

    public function managePost(int $id = null, array $data = [], string $method = 'GET'): array
    {
        $response = $this->client->request($method, "/posts/{$id}", [
            'json' => $data
        ]);
        return json_decode($response->getBody(), true);
    }
}
