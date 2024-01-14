<?php

namespace App\Http\Controllers;

use App\Services\ApiService;
use Illuminate\Http\Request;


class BoardGameController extends Controller
{
    protected $apiService;

    public function __construct(ApiService $apiService)
    {
        $this->apiService = $apiService;
    }


    public function index(Request $request, ApiService $apiService)
    {
        $cat = $request->get('cat', 'All');
        $data = $apiService->getAllData();


        return view('index', compact('data', 'cat'));
    }

    public function show($id, ApiService $apiService)
    {
        $data = $apiService->getAllData();
        $filteredData = array_filter($data, function ($value) use ($id) {
            return $value['id'] == $id;
        });
        if ($filteredData) {
            $gameData = reset($filteredData);

            return view('show', compact('gameData'));
        } else {
            return 'Aucune donnée disponible pour l\'ID spécifié.';
        }
    }

    public function edit($id, ApiService $apiService)
    {
        $data = $apiService->getAllData();
        $filteredData = array_filter($data, function ($value) use ($id) {
            return $value['id'] == $id;
        });

        if ($filteredData) {
            $gameData = reset($filteredData);

            return view('edit', compact('gameData'));
        } else {
            return 'Aucune donnée disponible pour l\'ID spécifié.';
        }
    }

    public function update(Request $request, $id)
    {
        $data = $this->apiService->getAllData();

        $filteredData = array_filter($data, function ($value) use ($id) {
            return $value['id'] == $id;
        });

        if ($filteredData) {
            $gameData = reset($filteredData);

            if ($gameData) {

                $gameData['name'] = $request->input('name');
                $gameData['description'] = $request->input('description');
                $gameData['price'] = $request->input('price');

                $this->apiService->editData($id, $gameData);

                return redirect()->route('show', ['id' => $id])->with('success', 'Le jeu a été modifié avec succès.');
            } else {
                return 'Aucune donnée disponible pour l\'ID spécifié.';
            }
        }
    }

    public function destroy($id)
    {

        $data = $this->apiService->getAllData();

        // Filtrer les détails du jeu en fonction de l'ID
        $filteredData = array_filter($data, function ($value) use ($id) {
            return $value['id'] == $id;
        });

        if ($filteredData) {
            $gameData = reset($filteredData);

            if ($gameData) {
                $this->apiService->deleteData($id);

                return redirect()->route('index')->with('success', 'Le jeu a été supprimé avec succès.');
            } else {
                return 'Aucune donnée disponible pour l\'ID spécifié.';
            }
        } else {
            return 'Aucune donnée disponible pour l\'ID spécifié.';
        }
    }

}
