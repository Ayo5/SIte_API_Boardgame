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




    // Ajoutez d'autres méthodes pour les opérations CRUD
}
