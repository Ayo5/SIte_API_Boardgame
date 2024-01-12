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

    public function index()
    {
        $data = $this->apiService->getAllData();
        return view('index', compact('data'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'image' => 'required|image',
        ]);

        $imagePath = $request->file('image')->store('images', 'public');

        $gameData = [
            'name' => $data['name'],
            'image' => $imagePath,
        ];

        $this->apiService->addGame($gameData);

        return redirect('/index');
    }
}
