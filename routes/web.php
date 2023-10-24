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
use App\Http\Controllers\UserController;

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

Route::any('/insertveneno', [ReceitaController::class, 'show'])->name('receita.insertveneno');

Route::post('/saveveneno', [ReceitaController::class, 'showveneno'])->name('receita.saveveneno');

Route::any('/receita/{idreceitas}/deletepulv', [ReceitaController::class, 'deletePulv'])->name('receita.deletepulv');

Route::any('/receita/{idreceitas}/agrotoxico/{idagrotoxico}/removeagrotoxico', [ReceitaController::class, 'removeagrotoxico'])->name('receita.removeagrotoxico');

Route::any('/receita/{idreceitas}/removerassociacao', [ReceitaController::class, 'removerassociacao'])->name('receita.removerassociacao');

Route::post('/receita/{idreceitas}/associarusuario', [ReceitaController::class, 'associarusuario'])->name('receita.associarusuario');

Route::any('/receita/historypulv', [ReceitaController::class, 'historypulv'])->name('produtor.historypulv');

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

Route::any('/pessoa/historypessoa', [PessoaController::class, 'show'])->name('pessoa.historypessoa');

Route::any('/pessoa/editpessoa/{idpessoa}', [PessoaController::class, 'edit'])->name('pessoa.editpessoa');

Route::any('/pessoa/updatepessoa/{idpessoa}', [PessoaController::class, 'update'])->name('pessoa.updatepessoa');

Route::any('/pessoa/destroypessoa/{idpessoa}', [PessoaController::class, 'destroy'])->name('pessoa.destroypessoa');

// pessoa //

// users //

Route::any('users/show', [UserController::class, 'show'])->name('users.user');

Route::any('users/edituser/{id}', [UserController::class, 'edit'])->name('users.edituser');

Route::any('users/updateuser/{id}', [UserController::class, 'update'])->name('users.updateuser');

Route::any('users/destroyuser/{id}', [UserController::class, 'destroy'])->name('users.destroyuser');

// users //