<?php

namespace App\Http\Controllers;

use App\Models\Receita;
use App\Models\Pessoa;
use App\Models\PulvVeneno;
use App\Models\Agrotoxico;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReceitaController extends Controller
{

    public function index(Request $request)
    {
        // Recupera o ID do usuário agrônomo logado
        $userId = Auth::id();

        $user = User::where('leveluser', 1)->get();

        $datareceita['data_receita'] = Carbon::parse($request['data_receita'])->format('d/m/Y');

        // Recupera as informações desejadas do banco de dados
        $receitas = Receita::with(['pessoa','pulvVeneno'=>function($q){
            return $q->with(['agrotoxico']);
        }])->where('coduser', $userId, $datareceita)
        ->orderBy('idreceitas', 'desc')
        ->get();
        
        foreach($receitas as $receita){
            $receita->data_receita = Carbon::parse($receita->data_receita)->format('d/m/Y H:i:s');
        }

        if ($request->isMethod('post')) {
            //dd($request->all());
            $receitas = Receita::whereHas('pessoa',function($q) use($request){
                $q->where('nome_pessoa', 'LIKE', '%' .$request->nome_cliente. '%');
            })->with(['pulvVeneno' =>function($q){
                return $q->with(['agrotoxico']);
            }])->get();    

        }
 
        return view('receita.history', compact('receitas', 'user'));
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
        $receita->data_receita = Carbon::now();
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

        $message = "Agrotoxico adicionado a pulverização com sucesso: ".$agrotoxico->nome_agrotoxico;

        return redirect(route('receita.insertveneno', compact('agrotoxicos')))->with('success', $message);
    }

    public function associarusuario(Request $request, $idreceitas){

        $receita = Receita::where('idreceitas', $idreceitas)->first();

        if($receita->cod_user_cliente != null){
            $message = "Pulverização já está vinculada ao cliente: ".$receita->clientes->name;

            return redirect(route('receita.history'))->with('erro', $message);

        }else{
                $receita->cod_user_cliente = $request->id;
                $receita->save();

                $message = "Pulverização vinculadas com sucesso à: ".$receita->clientes->name;
                return redirect(route('receita.history'))->with('success', $message);
        }

    }

    public function removerassociacao(Request $request, $idreceitas){

        $receita = Receita::where('idreceitas', $idreceitas)->first();

        if($receita->cod_user_cliente !== null){

            $receita->cod_user_cliente = null;
            $receita->save();

        }else{

            $message = "Não há produtor vinculado à pulverização";

            return redirect()->route(('receita.history'))->with('erro', $message);

        }

        $message = "Associação removida com sucesso!";

        return redirect(route('receita.history'))->with('success', $message);

    }

    public function deletePulv($idreceitas)
    {
        $pulv = Receita::where('idreceitas', $idreceitas)->delete();

        $message = "Pulverização removida com sucesso!";

        return redirect(route('receita.history'))->with('success', $message);
    }


    public function removeagrotoxico($idreceitas ,$idagrotoxico)
    {
        $agrotoxico = PulvVeneno::where('cod_receita', $idreceitas)->where('cod_agrotoxico', $idagrotoxico)->delete();

        $message = "Agrotoxico removido com sucesso!";

        return redirect(route('receita.history'))->with('success', $message);

    }

    public function historypulv(Request $request){

        $userId = Auth::id();
        
        $historypulv = Receita::where('cod_user_cliente', $userId)->get();

        return view('produtor.historypulv', compact('historypulv'));

    }
}
