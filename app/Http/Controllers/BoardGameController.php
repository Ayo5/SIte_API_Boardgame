<?php

namespace App\Http\Controllers;

use App\Models\BoardGame;
use App\Services\ApiService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;


class BoardGameController extends Controller
{
    protected $apiService;

    public function __construct(ApiService $apiService)
    {
        $this->apiService = $apiService;
    }

    public function index()
    {
        $data = session('data') ?? $this->apiService->getAllData();
        Log::info('Data for index view: ', (array) $data);

        return view('index', compact('data'));
    }

    public function create()
    {
        return view('create');
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
        ]);

        $imagePath = $request->file('image')->store('images', 'public');
        $validatedData['image'] = $imagePath;
        $apiService = new ApiService();
        $apiService->addGame($validatedData);
        return redirect()->route('game.index');
    }


    public function show($id)
    {
        $gameDetails = $this->apiService->getGameDetails($id);

        if ($gameDetails) {
            return view('show', compact('gameDetails'));
        } else {
            return 'Aucune donnée disponible.';
        }
    }



}
