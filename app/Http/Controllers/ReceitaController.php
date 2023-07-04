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

        $pessoas = Pessoa::all();

        //dd($request);


        $receita = new Receita;
        $receita->codpessoa = $request->idpessoa;
        $receita->tanque_veneno = $request->tanque_veneno;
        $receita->area_app = $request->area_app;
        $receita->cult = $request->cult;
        $receita->save();

        $agrotoxicos = Agrotoxico::all();

        if (!empty($request->agrotoxicos) && is_array($request->agrotoxicos)) {

            foreach ($request->agrotoxicos as $agrotoxico) {
                // dd($agrotoxico);
                $agrotoxico = Agrotoxico::where($agrotoxico->idagrotoxico);

                $pulvVeneno = new PulvVeneno;
                $pulvVeneno->cod_receita = $receita->idreceita;
                $pulvVeneno->cod_agrotoxico = $agrotoxico->idagrotoxico;
                dd($pulvVeneno);
                // $pulvVeneno->qtd_veneno = $request->;
                $pulvVeneno->save();
            }
        }

        return view('receita.insertveneno', compact('agrotoxicos'));

        //dd($agrotoxicos);

        // Redireciona para uma página de sucesso ou exibição dos dados salvos
    }

    // public function insertveneno(Request $request, Receita $receita)
    // {
    //     $receita = $request->idreceitas;
    //     $agrotoxicos = $request->agrotoxicos;
    //     $quantidades = $request->quantidades;
    //     if ($agrotoxicos !== null && $quantidades !== null && count($agrotoxicos) === count($quantidades)) {
    //         if (count($agrotoxicos) === count($quantidades)) {
    //             for ($i = 0; $i < count($agrotoxicos); $i++) {
    //                 $pulvVeneno = new PulvVeneno;
    //                 $pulvVeneno->cod_receita = $receita->idreceitas;
    //                 $pulvVeneno->cod_agrotoxico = $agrotoxicos[$i];
    //                 $pulvVeneno->qtd_veneno = $quantidades[$i];
    //                 $pulvVeneno->save();
    //             }
    //         }
    //     }
    // }

    //     return redirect()->route('receita.insertveneno')->with('success', 'Pulverização de agrotóxicos registrada com sucesso.');
    // }

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
