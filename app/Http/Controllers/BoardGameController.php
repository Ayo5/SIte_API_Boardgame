<?php

namespace App\Http\Controllers;

use App\Models\BoardGame;
use App\Services\ApiService;

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
        var_dump($data); // ou dd($data);
        return view('index', compact('data'));
    }

}
