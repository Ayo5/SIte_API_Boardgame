<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BoardGameController extends Controller
{
    public function index()
    {
        $boardGames = BoardGame::all();
        return view('boardgames.index', compact('boardGames'));
    }
}
