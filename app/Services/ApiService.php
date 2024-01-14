<?php

// app/Services/ApiService.php

namespace App\Services;

use GuzzleHttp\Client;

class ApiService
{
    protected $client;
    protected $apiUrl;

    public function __construct()
    {
        $this->client = new Client();
        $this->apiUrl = env('API_URL');
    }

    public function getAllData()
    {
        $response = $this->client->get($this->apiUrl);
        return json_decode($response->getBody()->getContents(), true);
    }

    public function getGameDetails($id)
    {

            $response = $this->client->get($this->apiUrl . '/api/board-games/' . $id);
            $gameDetails = json_decode($response->getBody()->getContents(), true);

            // Log the game details
            \Log::info('Game details from API: ', $gameDetails);

            return $gameDetails;

    }
// Ajoutez d'autres méthodes pour les opérations CRUD
}
