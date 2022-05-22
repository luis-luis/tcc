<?php

namespace App\Http\Controllers;

use App\Models\Receita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReceitaController extends Controller
{
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

        ]);

        if($validator->fails()){
            echo 'Por favor, preencher o nome do cliente';
        }

        try{
            $receita->nome_cliente = $request->cliente;
            $receita->tel_cliente = $request->phone;
            $receita->nome_veneno = $request->veneno1;
            $receita->nome_veneno2 = $request->veneno2;
            $receita->nome_veneno3 = $request->veneno3;
            $receita->nome_veneno4 = $request->veneno4;
            $receita->nome_veneno5 = $request->veneno5;
            $receita->qtd_veneno = $request->qtdv1;
            $receita->qtd_veneno2 = $request->qtdv2;
            $receita->qtd_veneno3 = $request->qtdv3;
            $receita->qtd_veneno4 = $request->qtdv4;
            $receita->qtd_veneno5 = $request->qtdv5;
            $receita->tanque_veneno = $request->pulv;
            $receita->area_app = $request->area_app;
            $receita->cult = $request->cult;
            $receita->save();
            
            return redirect()->route('receita.show', ['receita'=>$receita->idreceitas]);
            
        }catch(\Exception $e){
            echo $e->getMessage();
        };

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Receita  $receita
     * @return \Illuminate\Http\Response
     */
    public function show(Receita $receita)
    {
        //dd($receita);
        return view('receita.show', ['dados'=>$receita]);
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
