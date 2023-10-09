<?php

namespace App\Http\Controllers;

use App\Models\Cidade;
use App\Models\Pessoa;
use App\Models\Estado;
use App\Models\Endereco;
use App\Models\Pais;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Svg\Tag\Rect;

class PessoaController extends Controller
{

    public function pessoa(Request $request, Pessoa $pessoa)
    {
        //return view('pessoa.insertpessoa');

        // Recupere os dados das cidades
        $cidades = Cidade::pluck('nome_cidade', 'id_cidade');
        $estados = Estado::pluck('nome_estado', 'id_estado');
        $paises = Pais::pluck('nome_pais', 'id_pais');

        return view('pessoa.insertpessoa', compact('cidades', 'estados', 'paises'));
    }

    public function create(Request $request)
    {
        $pessoa = new Pessoa;
        $pessoa->nome_pessoa = $request->input('cliente');
        $pessoa->tel_pessoa = $request->input('phone');
        $pessoa->save();


        $endereco = new Endereco;
        $endereco->endereco = $request->input('endereco');
        $endereco->id_cidade = $request->input('id_cidade');
        $endereco->id_cidade = $request->cidades;
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



    public function store(Request $request)
    {
        //
    }


    public function show(Request $request, Pessoa $pessoa)
    {
        $userId = Auth::id();

        if ($request->isMethod('post')) {
            $pessoas = Pessoa::where('nome_pessoa', 'LIKE', '%' . $request->nome_cliente . '%')->get();
        } else {
            $pessoas = Pessoa::where('cod_user', $userId)->get();
        }

        return view('pessoa.historypessoa', compact('pessoas'));
    }


    public function edit(Request $request, Pessoa $idpessoa)
    {

        $cidades = Cidade::pluck('nome_cidade', 'id_cidade');
        $estados = Estado::pluck('nome_estado', 'id_estado');
        $paises = Pais::pluck('nome_pais', 'id_pais');

        return view('pessoa.insertpessoa', compact('cidades', 'estados', 'paises'));
        $pessoa = $idpessoa;

        return view('pessoa.editpessoa', compact('pessoa', 'cidades', 'estados', 'paises'));
    }


    public function update(Request $request, Pessoa $pessoa)
    {
        $pessoa = Pessoa::find('idpessoa');

        $pessoa->nome_pessoa = $request->input('cliente');
        $pessoa->tel_pessoa = $request->input('phone');
        $pessoa->save();


        $endereco->endereco = $request->input('endereco');
        $endereco->id_cidade = $request->input('id_cidade');
        $endereco->id_cidade = $request->cidades;
        $endereco->save();


        $pessoa->id_endereco = $endereco->id;
        $pessoa->save();


        $id_cidade = $request->input('id_cidade');


        $id_cidade = Cidade::find($id_cidade);
        $endereco->cidade()->associate($id_cidade);
        $endereco->save();

        $pessoa->nome_pessoa = $request->nome_pessoa;
        $pessoa->tel_pessoa = $request->tel_pessoa;
        $pessoa->save();

        return redirect()->route('pessoa.historypessoa')->with('success', 'Cadastro atualizado com sucesso!');;
    }

    public function destroy(Pessoa $pessoa)
    {
        //
    }
}
