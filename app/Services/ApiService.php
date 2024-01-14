<?php

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


    public function editData($id, $data)
    {
        $editUrl = $this->apiUrl . '/' . $id;

        $response = $this->client->put($editUrl, [
            'json' => $data
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }

    public function deleteData($id)
    {
        $deleteUrl = $this->apiUrl . '/' . $id;

        $response = $this->client->delete($deleteUrl);

        return json_decode($response->getBody()->getContents(), true);
    }
    public function addGame($gameData)
    {
        try {
            \Log::info('Adding game with data: ', $gameData);

            $imageName = uniqid() . '.' . $gameData['image']->getClientOriginalExtension();
            $gameData['image']->move(public_path('/'), $imageName);
            $gameData['image'] = $imageName;
            $response = $this->client->post($this->apiUrl, [
                'form_params' => $gameData,
            ]);

            // Log de la réponse de l'API
            $responseContent = json_decode($response->getBody()->getContents(), true);
            \Log::info('API response: ', $responseContent);

            return $responseContent;
        } catch (\Exception $e) {
            \Log::error('Error when adding game: ',  ['error' => $e->getMessage()]);
        }

        return null;
    }




}
