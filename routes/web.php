<?php

use App\Http\Controllers\CotacaoController;
use App\Http\Controllers\DespesaController;
use App\Http\Controllers\CotacaoItemController;
use App\Http\Controllers\HistoricoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\ReceitaController;
use App\Http\Controllers\PessoaController;
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

// pulverizacao //

Route::any('/receita', [ReceitaController::class, 'index'])->name('receita.history');

Route::any('/showreceita', [ReceitaController::class, 'mostrar'])->name('receita.insert');

//Route::any('/insertveneno', [ReceitaController::class, 'show'])->name('receita.insertveneno');

//Route::get('/receitashow', [ReceitaController::class, 'show'])->name('receita.show');

Route::any('/insertveneno', [ReceitaController::class, 'show'])->name('receita.insertveneno');

Route::any('/saveveneno', [ReceitaController::class, 'showveneno'])->name('receita.saveveneno');

Route::post('/receita/{idreceitas}/associarusuario', [ReceitaController::class, 'associarusuario'])->name('receita.associarusuario');

//Route::any('/saveveneno', [ReceitaController::class, 'insertveneno'])->name('receita.saveveneno');

// pulverizacao //

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/wpp/{receita}', [ReceitaController::class, 'wpp'])->name('receita.wpp');

Route::get('/registro', [RegistrationController::class, 'create'])->name('registro');

Route::post('registro', [RegistrationController::class, 'store']);

// despesa produtor //

Route::get('/despesa', [DespesaController::class, 'index'])->name('produtor.index');

Route::post('/despesa/insert', [DespesaController::class, 'insert'])->name('produtor.insert');

Route::any('/despesahistorico', [DespesaController::class, 'show'])->name('produtor.history');

// despesa produtor //

// cotacao produtor//
Route::any('/produtor/fornecedor', [CotacaoItemController::class, 'index'])->name('produtor.mostrarlojista');

Route::any('/produtor/cotacao/show', [CotacaoItemController::class, 'show'])->name('produtor.mostrarcotacao');

Route::any('/produtor/cotacao/insert/', [CotacaoItemController::class, 'store'])->name('produtor.cotacaoinsert');

Route::any('/produtor/cancelarpedido/{id}', [CotacaoItemController::class, 'cancelarpedido'])->name('produtor.cancelarpedido');

Route::any('/produtor/cotacao/{id}', [CotacaoItemController::class, 'produtofornecedor'])->name('produtor.cotacao');

// cotacao produtor//

// lojista //

Route::get('/produto', [ProdutoController::class, 'index'])->name('lojista.index');

Route::any('/produtohistorico', [ProdutoController::class, 'show'])->name('lojista.history');

Route::post('/insertproduto', [ProdutoController::class, 'store'])->name('lojista.insertproduto');

Route::any('/editproduto/{id}', [ProdutoController::class, 'edit'])->name('lojista.editproduto');

Route::any('/updateproduto/{id}', [ProdutoController::class, 'update'])->name('lojista.updateproduto');

Route::any('/destroyproduto/{id}', [ProdutoController::class, 'destroy'])->name('lojista.destroyproduto');

Route::any('/vercotacao', [ProdutoController::class, 'vercotacao'])->name('lojista.vercotacao');

Route::any('/atenderpedido/{id}', [ProdutoController::class, 'atenderpedido'])->name('lojista.atenderpedido');

Route::any('/recusarpedido/{id}', [ProdutoController::class, 'recusarpedido'])->name('lojista.recusarpedido');

// lojista //

// pessoa //

Route::get('/pessoa', [PessoaController::class, 'pessoa'])->name('pessoa.insertpessoa');

Route::post('/pessoa/insert', [PessoaController::class, 'create'])->name('pessoa.insert');

// pessoa //
