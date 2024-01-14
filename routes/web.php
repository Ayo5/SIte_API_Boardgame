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
