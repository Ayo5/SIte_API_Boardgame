<?php

namespace App\Http\Controllers;

use App\Models\BoardGame;

class BoardGameController extends Controller
{
    public function index()
    {
        $boardGames = BoardGame::all();
        return view('boardgames.index', compact('boardGames'));
    }
}
