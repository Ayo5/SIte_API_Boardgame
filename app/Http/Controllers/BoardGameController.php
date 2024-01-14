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

    public function index(Request $request)
    {
        $cat = $request->get('cat', 'All');
        $data = $this->apiService->getAllData();

        return view('index', compact('data', 'cat'));
    }

    public function show($id)
    {
        $data = $this->apiService->getAllData();

        if (!is_null($data) && is_array($data)) {
            $filteredData = array_filter($data, function ($value) use ($id) {
                return $value['id'] == $id;
            });

            if ($filteredData) {
                $gameData = reset($filteredData);
                return view('show', compact('gameData'));
            } else {
                return 'Aucune donnée disponible pour l\'ID spécifié.';
            }
        } else {
            return 'Erreur lors de la récupération des données depuis l\'API.';
        }
    }

    public function edit($id)
    {
        $data = $this->apiService->getAllData();
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

    public function create()
    {
        return view('create');
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

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Appel de la fonction addGame du service API avec les données validées
        $this->apiService->addGame($validatedData);

        return redirect()->route('index')->with('success', 'Le jeu a été ajouté avec succès.');
    }

}
