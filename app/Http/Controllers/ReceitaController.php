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
        // Recupera o ID do usuário agrônomo logado
        $userId = Auth::id();

        // Recupera as informações desejadas do banco de dados
        $dados = DB::table('pessoas')->rightJoin('receitas', 'receitas.codpessoa', '=', 'pessoas.idpessoa')
            ->join('pulv_venenos', 'receitas.idreceitas', '=', 'pulv_venenos.cod_receita')
            ->join('agrotoxicos', 'pulv_venenos.cod_agrotoxico', '=', 'agrotoxicos.idagrotoxico')
            ->where('receitas.coduser', $userId)
            ->get();

        if ($request->isMethod('post')) {
            $dados = DB::table('pessoas')->rightJoin('receitas', 'receitas.codpessoa', '=', 'pessoas.idpessoa')
            ->join('pulv_venenos', 'receitas.idreceitas', '=', 'pulv_venenos.cod_receita')
            ->join('agrotoxicos', 'pulv_venenos.cod_agrotoxico', '=', 'agrotoxicos.idagrotoxico')->where('nome_pessoa', 'LIKE', '%' . $request->nome_cliente . '%')->get();
        }

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
        $receita->data_receita = now();
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
