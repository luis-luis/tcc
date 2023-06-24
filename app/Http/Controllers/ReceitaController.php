<?php

namespace App\Http\Controllers;

use App\Models\Receita;
use App\Models\Pessoa;
use App\Models\PulvVeneno;
use App\Models\Agrotoxico;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class ReceitaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    { {
            if ($request->isMethod('post')) {
                $dados = Receita::where('nome_cliente', 'LIKE', '%' . $request->nome_cliente . '%')->where('nome_cliente', 'LIKE', '%' . Auth::user()->name . '%')->get();
                // dd($request->nome_despesa);

            } else {
                $dados = Receita::where('nome_cliente', 'LIKE', '%' . Auth::user()->name . '%')->get();
                //$dados = Receita::all();
            }

            return view('receita.history', ['dados' => $dados]);

            // return view('receita.history', ['dados' => $dados]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function mostrar()
    {
        return view('receita.insert');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {

        // Validação dos dados do formulário
        $validatedData = $request->validate([
            'idpessoa' => 'required|exists:pessoas,idpessoa',
            'tanque_veneno' => 'required',
            'area_app' => 'required',
            'cult' => 'required',
            'agrotoxicos' => 'required|array',
            'agrotoxicos.*.id' => 'exists:agrotoxicos,idagrotoxico',
            //'agrotoxicos.*.quantidade' => 'required|numeric',
        ]);

        // Busca a pessoa cadastrada
        $pessoa = Pessoa::find($request->idpessoa);

        // Cria uma nova receita e associa a pessoa
        $receita = new Receita;
        $receita->idpessoa = $pessoa->idpessoa;
        $receita->tanque_veneno = $request->tanque_veneno;
        $receita->area_app = $request->area_app;
        $receita->cult = $request->cult;
        //$receita->save();

        // Obtém os agrotóxicos do banco de dados
        $agrotoxicos = Agrotoxico::all();

        dd($agrotoxicos);

        // Percorre os venenos adicionados
        foreach ($request->agrotoxicos as $agrotoxico) {
            $agrotoxico = Agrotoxico::find($agrotoxico['idagrotoxico']);

            // Cria um novo pulv_veneno associado à receita e ao agrotóxico
            $pulvVeneno = new PulvVeneno;
            $pulvVeneno->idreceitas = $receita->idreceita;
            $pulvVeneno->idagrotoxico = $agrotoxico->idagrotoxico;
            $pulvVeneno->quantidade = $agrotoxico['quantidade'];
            //$pulvVeneno->save();
        }
    

        // Redireciona para uma página de sucesso ou exibição dos dados salvos
        //return view('receita.insertveneno', ['agrotoxicos' => $agrotoxicos]);


        //return view('receita.insertveneno', compact('agrotoxicos'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Receita  $receita
     * @return \Illuminate\Http\Response
     */
    public function edit(Receita $receita)
    {
        //return view('receita.insertveneno');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Receita  $receita
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Receita $receita)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Receita  $receita
     * @return \Illuminate\Http\Response
     */
    public function destroy(Receita $receita)
    {
        //
    }
}
