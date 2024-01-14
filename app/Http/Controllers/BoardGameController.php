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


}
