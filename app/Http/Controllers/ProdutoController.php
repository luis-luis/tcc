<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('lojista.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        if ($request->isMethod('post')) {
            $produtos = Produto::where('nome_produto', 'LIKE', '%' . $request->nome_produto . '%')->get();

        } else {
            $produtos = Produto::all();                
        }

        return view('lojista.history', compact('produtos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Criação de um novo produto com os dados do formulário
        $produto = new Produto;
        $produto->marca_produto = $request->marca_produto;
        $produto->nome_produto = $request->nome_produto;
        $produto->descricao_produto = $request->descricao_produto;
        $produto->valor_produto = $request->valor_produto;
        $produto->qtd_produto = $request->quantidade_produto;
        $produto->save();
    
        // Redirecionamento para uma página de sucesso ou exibição dos dados salvos
        return redirect()->route('lojista.history')->with('success', 'Produto cadastrado com sucesso!');
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function edit(Produto $produto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produto $produto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produto $produto)
    {
        //
    }
}
