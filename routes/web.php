<?php

use App\Http\Controllers\PokemonController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [PokemonController::class, 'index'])->name('home');
Route::get('/home', [PokemonController::class, 'index'])->name('home');
Route::get('/home/randomize', [PokemonController::class, 'suprise'])->name('suprise');
Route::get('/home/lowest', [PokemonController::class, 'lowest'])->name('lowest');
Route::get('/home/highest', [PokemonController::class, 'highest'])->name('highest');
Route::get('/home/a-to-z', [PokemonController::class, 'atoz'])->name('atoz');
Route::get('/home/z-to-a', [PokemonController::class, 'ztoa'])->name('ztoa');
Route::get('/detail/{pokemon}', [PokemonController::class, 'show'])->name('detail');
Route::get('/home/cari', [PokemonController::class, 'cari'])->name('cari');
