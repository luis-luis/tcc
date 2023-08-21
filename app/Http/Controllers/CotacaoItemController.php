<?php

namespace App\Http\Controllers;

use App\Models\CotacaoItem;
use App\Models\Produto;
use App\Models\Cotacao;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CotacaoItemController extends Controller
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

    public function store(Request $request, CotacaoItem $cotacaoItem)
    {

        $userId = Auth::user()->id;
        $x = 0;
        foreach ($request->produto as $produtoId => $quantidade) {

            $produto = Produto::find($produtoId);

            if ($quantidade <= $produto->qtd_produto) {
                if($quantidade == 0){
                    continue;
                }
                $x++;
                $cotacaoItem = new CotacaoItem;
                $cotacaoItem->cod_produto = $produtoId;
                $cotacaoItem->qtd_produto = $quantidade;

                //$cotacaoItem->save();

                $produto->qtd_produto -= $quantidade;
                $produto->save();
            } else {

                $message = "A quantidade solicitada é maior que a quantidade em estoque ou não há produtos em estoque";

                return redirect(route('produtor.cotacao'))->with('erro', $message);

            }
            // dd($cotacao);
        }      
        if($x == 0){
            $message = "A quantidade solicitada é maior que a quantidade em estoque ou não há produtos em estoque";

            return redirect(route('produtor.cotacao'))->with('erro', $message);
        }

        return view('produtor.mostrarcotacao');
    }

    public function show(Request $request)
    {

        $dados = Cotacao::all();

        return view('produtor.mostrarcotacao', compact('dados'));
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
