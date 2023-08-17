<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Cotacao;
use App\Models\Receita;
use App\Models\Pessoa;
use App\Models\PulvVeneno;
use App\Models\Agrotoxico;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CotacaoController extends Controller
{

    public function index()
    {
        $produtos = Produto::all();
        return view('produtor.cotacao', compact('produtos'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request, Cotacao $cotacao)
    {

        $userId = Auth::user()->id;

        foreach ($request->produto as $produtoId => $quantidade) {
            $cotacao = new Cotacao;
            $cotacao->cod_produto = $produtoId; 
            $cotacao->cod_user = $userId;
            $cotacao->qtd_produto = $quantidade;

            // dd($cotacao);

            // $cotacao->save();
        }

        return view('produtor.mostrarcotacao');
    }

    public function show(Request $request)
    {

        // $dados - Cotacao::all();

        return view('produtor.mostrarcotacao');

    }

    public function edit(cotacao $cotacao)
    {
        //
    }

    public function update(Request $request, cotacao $cotacao)
    {
        //
    }

    public function destroy(cotacao $cotacao)
    {
        //
    }
}



// $userId = Auth::id();

// $cotacao = new Cotacao;
// $cotacao->cod_produto = $request->idproduto;
// $userId = Auth::user()->id;
// $cotacao->cod_user = $userId;
// $cotacao->qtd_produto = $request->produto;

// dd($cotacao);
// // dd($request->produto);

// $cotacao->save();
