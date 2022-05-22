<?php

use App\Http\Controllers\HistoryController;
use App\Http\Controllers\ReceitaController;
use App\Http\Controllers\RecipeController;
use App\Models\Receita;
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

Route::get('/', function () {
    return view('site.home');
})->name('site.home');

Route::get('/historico', [HistoryController::class, 'historico'])->name('site.history');

Route::get('/receita', [ReceitaController::class, 'index'])->name('receita.index');

Route::post('/receita/insert', [ReceitaController::class, 'insert'])->name('receita.insert');

Route::get('/receita/show/{receita}', [ReceitaController::class, 'show'])->name('receita.show');