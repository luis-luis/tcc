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

        $userId = Auth::id();

        
        $pessoa = new Pessoa;
        $pessoa->nome_pessoa = $request->input('cliente');
        $pessoa->tel_pessoa = $request->input('phone');
        $pessoa->cod_user = $userId;
        $pessoa->save();


        $endereco = new Endereco;
        $endereco->endereco = $request->input('endereco');
        $endereco->id_cidade = $request->input('id_cidade');
        $endereco->id_cidade = $request->cidades;
        $endereco->save();


        $pessoa->id_endereco = $endereco->id_enderecos;
        $pessoa->save();


        // $id_cidade = $request->input('id_cidade');


        // $id_cidade = Cidade::find($id_cidade);
        // $endereco->cidade()->associate($id_cidade);
        // $endereco->save();

        // $endereco->id_cidade = $request->input('id_cidade');
        // $endereco->save();

        // $cidade->cod_estado = $request->input('id_estado');
        // $cidade->save();

        return redirect()->route('pessoa.historypessoa')->with('success', 'Cliente cadastrado com sucesso!');
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
            if($pessoa->deleted_at != null){
                $pessoas = Pessoa::where('cod_user', $userId)->withTrashed()->get();
            }else{
                $pessoas = Pessoa::where('cod_user', $userId)->get();
            }
                
        }

        return view('pessoa.historypessoa', compact('pessoas'));
    }


    public function edit(Request $request, Pessoa $idpessoa)
    {

        $cidades = Cidade::pluck('nome_cidade', 'id_cidade');
        $estados = Estado::pluck('nome_estado', 'id_estado');
        $paises = Pais::pluck('nome_pais', 'id_pais');
        $endereco = Endereco::pluck('endereco', 'id_enderecos');

        $pessoa = $idpessoa;

        return view('pessoa.editpessoa', compact('pessoa', 'cidades', 'estados', 'paises', 'endereco'));
    }


    public function update(Request $request, $idpessoa)
    {
        // dd($request);

        $pessoa = Pessoa::where('idpessoa', $idpessoa)->first();
        $pessoa->nome_pessoa = $request->nome_pessoa;
        $pessoa->tel_pessoa = $request->tel_pessoa;
        $pessoa->save();

        $endereco = Endereco::where('id_enderecos', $pessoa->endereco->id_enderecos)->first();
        $endereco->endereco = $request->endereco;
        $endereco->id_cidade = $request->cidades;
        $endereco->save();


        $pessoa->id_endereco = $endereco->id_enderecos;
        $pessoa->save();


        // $id_cidade = $request->input('id_cidade');


        // $id_cidade = Cidade::find($id_cidade);
        // $endereco->cidade()->associate($id_cidade);
        // $endereco->save();

        return redirect()->route('pessoa.historypessoa')->with('success', 'Cadastro atualizado com sucesso!');;
    }

    public function destroy($idpessoa)
    {
        $pessoa = Pessoa::where('idpessoa', $idpessoa)->delete();

        return redirect()->back()->with('success', 'Cadastro Inativado com sucesso!');
    }
}
