<?php

use App\Http\Controllers\DespesaController;
use App\Http\Controllers\HistoricoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\ReceitaController;
use App\Models\Receita;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;


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

Route::get('/', [HomeController::class, 'index'])->name('site.home');

Route::get('/historico', [HistoricoController::class, 'index'])->name('site.history');

Route::get('/receita', [ReceitaController::class, 'index'])->name('receita.index');

Route::post('/receita/insert', [ReceitaController::class, 'insert'])->name('receita.insert');

Route::get('/receita/show/{receita}', [ReceitaController::class, 'show'])->name('receita.show');

Route::get('/receita/showpdf/{receita}', [ReceitaController::class, 'showPDF'])->name('receita.showpdf');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/wpp/{receita}', [ReceitaController::class, 'wpp'])->name('receita.wpp');

Route::get('/registro', [RegistrationController::class, 'create'])->name('registro');

Route::post('registro', [RegistrationController::class, 'store']);

Route::get('/despesa', [DespesaController::class, 'index'])->name('produtor.index');

Route::post('/despesa/insert', [DespesaController::class, 'insert'])->name('produtor.insert');

Route::get('/produto', [ProdutoController::class, 'index'])->name('lojista.index');

Route::get('/historicodespesa', [DespesaController::class, 'show'])->name('produtor.history');

Route::post('/showhistory', [DespesaController::class, 'historico'])->name('produtor.showhistory');



