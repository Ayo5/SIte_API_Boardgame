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


Route::get('/', [BoardGameController::class, 'index'])->name('index');
Route::get('/game/{id}', [BoardGameController::class, 'show'])->name('show');
Route::get('/game/{id}/edit', [BoardGameController::class, 'edit'])->name('edit');
Route::put('/game/{id}', [BoardGameController::class, 'update'])->name('update');
Route::delete('/game/{id}', [BoardGameController::class, 'destroy'])->name('delete');
Route::get('/create', [BoardGameController::class, 'create'])->name('game.create');
Route::post('/store', [BoardGameController::class, 'store'])->name('game.store');
Route::get('/game/{id}', [BoardGameController::class, 'show'])->name('game.show');


