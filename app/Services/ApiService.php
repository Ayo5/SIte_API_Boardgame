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
            $data = json_decode($response->getBody()->getContents(), true);

            // Log the data
            \Log::info('Data from API: ', (array) $data);

            return $data;
        } catch (\Exception $e) {
            echo 'Error when retrieving data: ',  $e->getMessage(), "\n";
        }

        return null;
    }

    public function addGame($gameData)
    {
        try {
            \Log::info('Adding game with data: ', $gameData);

            $response = $this->client->post($this->apiUrl . '/api/board-games', [
                'json' => $gameData
            ]);

            $responseContent = json_decode($response->getBody()->getContents(), true);
            \Log::info('API response: ', $responseContent);

            return $responseContent;
        } catch (\Exception $e) {
            \Log::error('Error when adding game: ',  ['error' => $e->getMessage()]);
        }

        return null;
    }

    public function getGameById($id)
    {
        try {
            $response = $this->client->get($this->apiUrl . '/api/board-games/' . $id);
            $game = json_decode($response->getBody()->getContents(), true);

            // Log the data
            \Log::info('Data for game details: ', (array) $game);

            return $game;
        } catch (\Exception $e) {
            // Log the error message
            \Log::error('Error when retrieving game details: ', ['error' => $e->getMessage()]);
        }

        return null;
    }

    public function getGameDetails($id)
    {
        try {
            $response = $this->client->get($this->apiUrl . '/api/board-games/' . $id);
            $gameDetails = json_decode($response->getBody()->getContents(), true);

            // Log the game details
            \Log::info('Game details from API: ', $gameDetails);

            return $gameDetails;
        } catch (\Exception $e) {
            \Log::error('Error when retrieving game details: ', ['error' => $e->getMessage()]);
        }

        return null;
    }

}
