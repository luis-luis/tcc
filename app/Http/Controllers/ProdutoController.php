<?php

namespace App\Http\Controllers;

use App\Models\Cotacao;
use App\Models\Produto;
use Symfony\Component\Routing\Route;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProdutoController extends Controller
{

    public function index()
    {
        return view('lojista.index');
    }


    public function show(Request $request)
    {
        $userId = Auth::id();

        if ($request->isMethod('post')) {
            $produtos = Produto::where('nome_produto', 'LIKE', '%' . $request->nome_produto . '%')->where('cod_user', $userId)->get();
        } else {
            $produtos = Produto::where('cod_user', $userId)->withTrashed()->get();
        }

        return view('lojista.history', compact('produtos'));
    }

    public function mostrarlojista(Request $request)
    {
        
    }

    public function store(Request $request)
    {

        $userId = Auth::id();

        // Criação de um novo produto com os dados do formulário
        $produto = new Produto;
        $produto->marca_produto = $request->marca_produto;
        $produto->nome_produto = $request->nome_produto;
        $produto->descricao_produto = $request->descricao_produto;
        $produto->valor_produto = $request->valor_produto;
        $produto->qtd_produto = $request->quantidade_produto;
        $userId = Auth::user()->id;
        $produto->cod_user = $userId;
        $produto->save();

        // Redirecionamento para uma página de sucesso ou exibição dos dados salvos
        return redirect()->route('lojista.history')->with('success', 'Produto cadastrado com sucesso!');
    }


    public function edit(Request $request, Produto $id)
    {
        $produto = $id;
        return view('lojista.edit', compact('produto'));
    }


    public function update(Request $request, $id)
    {

        $produto = Produto::find($id);

        $produto->marca_produto = $request->marca_produto;
        $produto->nome_produto = $request->nome_produto;
        $produto->descricao_produto = $request->descricao_produto;
        $produto->valor_produto = $request->valor_produto;
        $produto->qtd_produto = $request->quantidade_produto;
        $produto->save();

        return redirect()->route('lojista.history')->with('success', 'Produto atualizado com sucesso!');;
    }

    public function destroy($id)
    {
        $produto = Produto::where('id', $id)->delete();

        return redirect()->route('lojista.history')->with('success', 'Produto excluido com sucesso!');
    }

    public function vercotacao(Request $request, Cotacao $cotacoes)
    {
        $cotacoes = Cotacao::find('idcotacoes');

        return view('lojista.vercotacao');
    }
}
