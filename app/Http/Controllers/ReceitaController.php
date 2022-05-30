<?php

namespace App\Http\Controllers;

use App\Models\Receita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Barryvdh\DomPDF\Facade as PDF;

class ReceitaController extends Controller
{
    //função para obrigar fazer login
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('receita.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function insert(Request $request, Receita $receita)
    {
         $validator = Validator::make($request->all(), [
               'cliente' => 'required',
        //     'phone' => 'required',
        //     'veneno1' => 'required',
        //     'qtdv1' => 'required'

         ]);

         if ($validator->fails()) {
            echo 'Por favor, preencher o nome do cliente';
        //     echo 'Por favor, preencher o telefone do cliente';
        //     echo 'Por favor, preencher o veneno a ser utilizado';
        //     echo 'Por favor, preencher a quantidade de veneno a ser utilizado';
        }

        try {
            $receita->nome_cliente = $request->cliente;
            $receita->tel_cliente = preg_replace("/[^a-zA-Z0-9]+/", "", $request->phone);
            $receita->nome_veneno = $request->veneno;
            $receita->qtd_veneno = $request->qtdv;
            $receita->nome_veneno2 = $request->veneno2;
            $receita->qtd_veneno2 = $request->qtdv2;
            $receita->nome_veneno3 = $request->veneno3;
            $receita->qtd_veneno3 = $request->qtdv3;
            $receita->nome_veneno4 = $request->veneno4;
            $receita->qtd_veneno4 = $request->qtdv4;
            $receita->nome_veneno5 = $request->veneno5;
            $receita->qtd_veneno5 = $request->qtdv5;
            $receita->tanque_veneno = $request->pulv;
            $receita->area_app = $request->area_app;
            $receita->cult = $request->cult;
            $receita->save();

            return redirect()->route('receita.show', ['receita' => $receita->idreceitas]);
        } catch (\Exception $e) {
            echo $e->getMessage();
        };
    }

    /**
     * Display the specified resource..
     *
     * @param  \App\Models\Receita  $receita
     * @return \Illuminate\Http\Response
     */
    public function show(Receita $receita)
    {
        //dd($receita);
        
        return view('receita.show', ['dados' => $receita]);
    }

    public function showPDF(Receita $receita)
    {
        //dd($receita);
        $pdf = PDF::loadView('receita.show', ['dados' => $receita])->setOptions(['defaultFont' => 'sans-serif']);
        return $pdf->download('receita.pdf');
    }

    public function wpp(Receita $receita)
    {
        $text = "Ola senhor(a) $receita->nome_cliente. Segue os dados da sua receita e a cultura onde será aplicada: 
        Nº Da Receita: $receita->idreceitas
        Cultura: $receita->cult
        Tamanho do tanque: $receita->tanque_veneno
        Tamanho da Área a ser aplicada: $receita->area_app alq.
        Veneno 1: $receita->nome_veneno, $receita->qtd_veneno
        Veneno 2: $receita->nome_veneno2, $receita->qtd_veneno2
        Veneno 3: $receita->nome_veneno3, $receita->qtd_veneno3
        Veneno 4: $receita->nome_veneno4, $receita->qtd_veneno4
        Veneno 5: $receita->nome_veneno5, $receita->qtd_veneno5";
        return redirect('https://wa.me/55'.$receita -> tel_cliente.'?text='.urlencode($text));
    }

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Receita  $receita
     * @return \Illuminate\Http\Response
     */
    public function edit(Receita $receita)
    {
        //
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
