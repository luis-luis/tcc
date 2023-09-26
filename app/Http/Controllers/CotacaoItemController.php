<?php

namespace App\Http\Controllers;

use App\Models\CotacaoItem;
use App\Models\Produto;
use App\Models\Cotacao;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CotacaoItemController extends Controller
{

    /*função para trazer apenas os usuários fornecedores*/
    public function index()
    {
        $fornecedor = User::where('leveluser', 3)->get();
        
        return view('produtor.mostrarlojista', compact('fornecedor'));
    }

    public function produtofornecedor($id)
    {
        $produtos = Produto::where('cod_user', $id)->get();
        
        return view('produtor.cotacao', compact('produtos'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request, CotacaoItem $cotacaoItem)
    {
        $userId = Auth::user()->id;
        $cotacao = new Cotacao;
        $cotacao->cod_user = $userId;
        $cotacao->valor_cotacao = 0;
        $cotacao->save();
        $x = 0;
        // dd($cotacao);
        foreach ($request->produto as $produtoId => $quantidade) {

            $produto = Produto::find($produtoId);

            if ($quantidade <= $produto->qtd_produto) {
                if ($quantidade == 0) {
                    continue;
                }
                $x++;
                $cotacaoItem = new CotacaoItem;
                $cotacaoItem->cod_produto = $produtoId;
                $cotacaoItem->qtd_produto = $quantidade;
                $cotacaoItem->cod_cotacao = $cotacao->idcotacoes;
                $cotacao->valor_cotacao += $produto->valor_produto * $quantidade;
                $cotacaoItem->save();
                $cotacao->save();

                $produto->qtd_produto -= $quantidade;
                $produto->save();
            } else {

                $message = "A quantidade solicitada é maior que a quantidade em estoque ou não há produtos em estoque";

                return redirect(route('produtor.cotacao'))->with('erro', $message);
            }
            // dd($cotacao);
        }
        if ($x == 0) {
            $cotacao->delete();
            $message = "A quantidade solicitada é maior que a quantidade em estoque ou não há produtos em estoque";

            return redirect(route('produtor.cotacao'))->with('erro', $message);
        }

        return redirect(route('produtor.mostrarcotacao', ['idcotacoes' => $cotacao->idcotacoes]));
    }


    /*Função show:
    começando debaixo para cima: 
    withTrashed(); -> traz os produto excluidos para dentro de 'produto=>function...'
    que retorna para dentro de 'itens=>function', que está dentro de uma cotação, pertencente a variável $dados;
    */
    public function show(Request $request)
    {
        $dados = Cotacao::with(['itens' => function ($q) {
            return $q->with(['produto' => function ($q) {
                return $q->withTrashed();
            }]);
        }])->where('cod_user', '=', Auth::user()->id)->get();
        // dd($dados[5]);
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
