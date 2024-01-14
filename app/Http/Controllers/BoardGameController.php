<?php

namespace App\Http\Controllers;

use App\Models\BoardGame;
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
        $gameDetails = $apiService->getAllData();

        // Filtrer les détails du jeu en fonction de l'ID
        $filteredDetails = array_filter($gameDetails, function ($value) use ($id) {
            return $value['id'] == $id;
        });

        if ($filteredDetails) {
            // Utiliser reset() pour obtenir le premier élément du tableau filtré
            $firstDetail = reset($filteredDetails);

            return view('show', compact('firstDetail'));
        } else {
            return 'Aucune donnée disponible pour l\'ID spécifié.';
        }
    }

    public function edit($id, ApiService $apiService)
    {
        $gameDetails = $apiService->getAllData();

        // Filtrer les détails du jeu en fonction de l'ID
        $filteredDetails = array_filter($gameDetails, function ($value) use ($id) {
            return $value['id'] == $id;
        });

        if ($filteredDetails) {
            // Utiliser reset() pour obtenir le premier élément du tableau filtré
            $firstDetail = reset($filteredDetails);

            return view('edit', compact('firstDetail'));
        } else {
            return 'Aucune donnée disponible pour l\'ID spécifié.';
        }
    }

    public function update(Request $request, $id)
    {
        // Récupérer les détails du jeu par ID
        $gameDetails = $this->apiService->getAllData();

        $filteredDetails = array_filter($gameDetails, function ($value) use ($id) {
            return $value['id'] == $id;
        });

        if ($filteredDetails) {
            // Récupérer le premier élément du tableau filtré
            $firstDetail = reset($filteredDetails);

            if ($firstDetail) {
                // Mettre à jour les détails du jeu avec les données du formulaire
                $firstDetail['name'] = $request->input('name');
                $firstDetail['description'] = $request->input('description');
                $firstDetail['price'] = $request->input('price');
                // ... mettez à jour d'autres champs en conséquence

                // Enregistrez les modifications à l'aide de la méthode editData de votre service
                $this->apiService->editData($id, $firstDetail);

                return redirect()->route('show', ['id' => $id])->with('success', 'Le jeu a été modifié avec succès.');
            } else {
                return 'Aucune donnée disponible pour l\'ID spécifié.';
            }
        }
    }

    public function destroy($id)
    {
        // Récupérer les détails du jeu par ID
        $gameDetails = $this->apiService->getAllData();

        // Filtrer les détails du jeu en fonction de l'ID
        $filteredDetails = array_filter($gameDetails, function ($value) use ($id) {
            return $value['id'] == $id;
        });

        if ($filteredDetails) {
            // Récupérer le premier élément du tableau filtré
            $firstDetail = reset($filteredDetails);

            if ($firstDetail) {
                // Supprimer le jeu à l'aide de la méthode deleteData de votre service
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
