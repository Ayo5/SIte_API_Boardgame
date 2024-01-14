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




}
