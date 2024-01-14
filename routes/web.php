<?php

use App\Http\Controllers\BoardGameController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/index', [BoardGameController::class, 'index'])->name('game.index');

Route::get('/create', [BoardGameController::class, 'create']);
Route::post('/store', [BoardGameController::class, 'store'])->name('game.store');
Route::get('/game/{id}', [BoardGameController::class, 'show'])->name('game.show');

