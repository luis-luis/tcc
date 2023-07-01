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
                $dados = Receita::where('nome_pessoa', 'LIKE', '%' . $request->nome_pessoa . '%')->where('nome_pessoa', 'LIKE', '%' . Auth::user()->name . '%')->get();
                // dd($request->nome_despesa);

            } else {
                $dados = Receita::where('nome_pessoa', 'LIKE', '%' . Auth::user()->name . '%')->get();
                //$dados = Receita::all();
            }

            return view('receita.history', ['dados' => $dados]);

            // return view('receita.history', ['dados' => $dados]);
        }
    }

    public function mostrar()
    {
        $pessoas = Pessoa::all();
        return view('receita.insert', compact('pessoas'));
    }


    public function show(Request $request)
    {
        // Busca a pessoa cadastrada
        $pessoas = Pessoa::all();

        //dd($request);

        // Cria uma nova receita e associa a pessoa
        $receita = new Receita;
        $receita->codpessoa = $request->idpessoa;
        $receita->tanque_veneno = $request->tanque_veneno;
        $receita->area_app = $request->area_app;
        $receita->cult = $request->cult;
        $receita->save();

        // Obtém os agrotóxicos do banco de dados
        $agrotoxicos = Agrotoxico::all();

        if (!empty($request->agrotoxicos) && is_array($request->agrotoxicos)) {

            // Percorre os venenos adicionados
            foreach ($request->agrotoxicos as $agrotoxico) {
                $agrotoxico = Agrotoxico::find($agrotoxico->idagrotoxico);

                // Cria um novo pulvveneno associado à receita e ao agrotóxico
                $pulvVeneno = new PulvVeneno;
                $pulvVeneno->codreceita = $receita->idreceita;
                $pulvVeneno->codagrotoxico = $agrotoxico->idagrotoxico;
                $pulvVeneno->qtd_veneno = $agrotoxico['quantidade'];
                $pulvVeneno->save();
            }
        }

        //dd($agrotoxicos);

        // Redireciona para uma página de sucesso ou exibição dos dados salvos

        return view('receita.insertveneno', compact('agrotoxicos'));
    }

    public function pulvveneno(Receita $receita, Agrotoxico $agrotoxico)
    {

        // Cria um novo pulvveneno associado à receita e ao agrotóxico
        $pulvVeneno = new PulvVeneno;
        $pulvVeneno->codreceita = $receita->idreceita;
        $pulvVeneno->codagrotoxico = $agrotoxico->idagrotoxico;
        $pulvVeneno->qtd_veneno = $agrotoxico['quantidade'];
        $pulvVeneno->save();
    }

    public function edit(Receita $receita)
    {
    }


    public function update(Request $request, Receita $receita)
    {
        //
    }


    public function destroy(Receita $receita)
    {
        //
    }
}


        // Validação dos dados do formulário
        // $validatedData = $request->validate([
        //     'idpessoa' => 'required|exists:pessoas,idpessoa',
        //     'tanque_veneno' => 'required',
        //     'area_app' => 'required',
        //     'cult' => 'required',
        //     'agrotoxicos' => 'required|array',
        //     'agrotoxicos.*.id' => 'exists:agrotoxicos,idagrotoxico',
        //     //'agrotoxicos.*.quantidade' => 'required|numeric',
        // ]);
