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
        try {
            $response = $this->client->get($this->apiUrl . '/api/board-games');
            return json_decode($response->getBody()->getContents(), true);
        } catch (\Exception $e) {
            // Display the error message for debugging
            echo 'Error when retrieving data: ',  $e->getMessage(), "\n";
        }

        return null;
    }

    public function addGame($gameData)
    {
        try {
            // Log the game data
            \Log::info('Adding game with data: ', $gameData);

            $response = $this->client->post($this->apiUrl . '/api/board-games', [
                'json' => $gameData
            ]);

            // Log the API response
            $responseContent = json_decode($response->getBody()->getContents(), true);
            \Log::info('API response: ', $responseContent);

            return $responseContent;
        } catch (\Exception $e) {
            // Log the error message
            \Log::error('Error when adding game: ',  ['error' => $e->getMessage()]);
        }

        return null;
    }

}
