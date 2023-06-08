<?php

namespace App\Http\Controllers;

use App\Models\Cidade;
use App\Models\Pessoa;
use App\Models\Estado;
use App\Models\Endereco;
use App\Models\Pais;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;
use Svg\Tag\Rect;

class PessoaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function pessoa(Request $request, Pessoa $pessoa)
     {
         //return view('pessoa.insertpessoa');

        // Recupere os dados das cidades
        $cidades = Cidade::pluck('nome_cidade', 'id_cidade');
        $estados = Estado::pluck('nome_estado', 'id_estado');
        $paises = Pais::pluck('nome_pais', 'id_pais');
        return view('pessoa.insertpessoa', compact('cidades','estados','paises'));
        //return view('pessoa.insertpessoa', compact('cidades'));
 
    }
     

    // public function index(Cidade $cidade)
    // {
    //     $cidade = Cidade::where('nome_cidade', 'LIKE', '%' . Cidade::()->name . '%')->get();
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
     public function create(Request $request)
    {
        $pessoa = new Pessoa;
        $pessoa->nome_pessoa = $request->input('cliente');
        $pessoa->tel_pessoa = $request->input('phone');
        $pessoa->save();

        
        $endereco = new Endereco;
        $endereco->endereco = $request->input('endereco');
        $endereco->id_cidade = $request->input('id_cidade'); 
        $endereco->save();

        
        $pessoa->id_endereco = $endereco->id;
        $pessoa->save();

        
        $id_cidade = $request->input('id_cidade');

        
        $id_cidade = Cidade::find($id_cidade);
        $endereco->cidade()->associate($id_cidade);
        $endereco->save();

        // $endereco->id_cidade = $request->input('id_cidade');
        // $endereco->save();
        
        // $cidade->cod_estado = $request->input('id_estado');
        // $cidade->save();

        return redirect()->back()->with('success', 'Cliente cadastrado com sucesso!');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pessoa  $pessoa
     * @return \Illuminate\Http\Response
     */
    public function show(Pessoa $pessoa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pessoa  $pessoa
     * @return \Illuminate\Http\Response
     */
    public function edit(Pessoa $pessoa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pessoa  $pessoa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pessoa $pessoa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pessoa  $pessoa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pessoa $pessoa)
    {
        //
    }
}


     // $pessoa = new Pessoa();
        // $pessoa->nome_pessoa = $request->cliente;
        // $pessoa->tel_pessoa = $request->phone;
        // $pessoa->save();

        // dd($pessoa->save());