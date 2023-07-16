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
use Illuminate\Support\Facades\DB;

class ReceitaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // {
        //     if ($request->isMethod('post')) {
        //         $dados = Receita::where('idreceitas', 'LIKE', '%' . $request->idreceitas . '%')->where('nome_pessoa', 'LIKE', '%' . Auth::user()->name . '%')->get();

        //     } else {
        //         $dados = Receita::where('idreceitas', 'LIKE', '%' . Auth::user()->name . '%')->get();
        //         //$dados = Receita::all();
        //     }
        //     $dados = Receita::all();
        //     //$dados = Pessoa::all();
        //     // $dados = PulvVeneno::all();
        //     // $dados = Agrotoxico::all();
        //     return view('receita.history', compact('dados'));
        // //}

        // {
        //     if ($request->isMethod('post')) {
        //         $dados = Receita::where('codpessoa', Auth::id())->get();
        //     } else {
        //         $dados = Receita::where('idreceitas', Auth::id())->get();
        //     }

        //     return view('receita.history', ['dados' => $dados]);
        // }

        // Recupera o ID do usuário agrônomo logado
        $userId = Auth::id();

        // Recupera as informações desejadas do banco de dados
        $dados = Pessoa::select('pessoas.nome_pessoa', 'pessoas.tel_pessoa', 'receitas.tanque_veneno', 'receitas.data_receita',
         'receitas.area_app', 'receitas.cult', 'agrotoxicos.nome_agrotoxico', 'pulv_venenos.qtd_veneno')
            ->join('receitas', 'pessoas.idpessoa', '=', 'receitas.codpessoa')
            ->join('pulv_venenos', 'receitas.idreceitas', '=', 'pulv_venenos.cod_receita')
            ->join('agrotoxicos', 'pulv_venenos.cod_agrotoxico', '=', 'agrotoxicos.idagrotoxico')
            ->where('pessoas.user_id', $userId)
            ->get();

        return view('receita.history', compact('dados'));
    }

    public function mostrar()
    {
        $pessoas = Pessoa::all();
        return view('receita.insert', compact('pessoas'));
    }

    public function show(Request $request)
    {
        $pessoas = Pessoa::all();

        $receita = new Receita;
        $receita->codpessoa = $request->idpessoa;
        $receita->tanque_veneno = $request->tanque_veneno;
        $receita->area_app = $request->area_app;
        $receita->cult = $request->cult;
        $userId = Auth::user()->id;
        $receita->coduser = $userId;
        $receita->save();

        $agrotoxicos = Agrotoxico::all();

        return view('receita.insertveneno', compact('agrotoxicos'));
    }

    public function showveneno(Request $request, Receita $receita)
    {

        $receitaId = DB::table('receitas')->max('idreceitas');

        if (!empty($request->agrotoxicos) && is_array($request->agrotoxicos)) {
            foreach ($request->agrotoxicos as $idagrotoxico) {

                $agrotoxico = Agrotoxico::find($idagrotoxico)->first();
                if ($agrotoxico) {
                    $pulvVeneno = new PulvVeneno;
                    $pulvVeneno->cod_receita = $receitaId;
                    $pulvVeneno->cod_agrotoxico = $agrotoxico->idagrotoxico;
                    $pulvVeneno->qtd_veneno = $request->quantidade;
                    $pulvVeneno->save();
                }
            }
        }

        $agrotoxicos = Agrotoxico::all();

        return view('receita.insertveneno', compact('agrotoxicos'));
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
