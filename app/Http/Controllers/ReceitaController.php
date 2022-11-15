<?php

namespace App\Http\Controllers;

use App\Models\Receita;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;

class ReceitaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        {
            if ($request->isMethod('post')) {
                $dados = Receita::where('nome_cliente', 'LIKE', '%' . $request->nome_cliente . '%')->get();
                // dd($request->nome_despesa);
    
            } else {
                $dados = Receita::all();
            }
    
            return view('receita.history', ['dados' => $dados]);
        }
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
    public function store(Request $request)
    {
        // $validator = Validator::make($request->all(), []);

        // if ($validator->fails()) {
        // }

        // try {
        //     $receita = new Receita();
        //     $receita->cliente = $request->nome_cliente;
        //     $receita->phone = $request->tel_cliente;
        //     $receita->cult = $request->cult;
        //     $receita->area_app = $request->area_app;
        //     $receita->pulv = $request->tanque_veneno;
        //     $receita->save();

        //     return redirect()->route('site.home');
        // } catch (\Exception $e) {
        //     echo $e->getMessage();
        // };
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Receita  $receita
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Receita $receita)
    {
        return view('receita.insert');

        $validator = Validator::make($request->all(), []);
        
        if ($validator->fails()) {
        }

        try {
            $receita = new Receita();
            $receita->cliente = $request->nome_cliente;
            $receita->phone = $request->tel_cliente;
            $receita->cult = $request->cult;
            $receita->area_app = $request->area_app;
            $receita->pulv = $request->tanque_veneno;
            $receita->save();

            return redirect()->route('receita.insertveneno');
        } catch (\Exception $e) {
            echo $e->getMessage();
        };
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Receita  $receita
     * @return \Illuminate\Http\Response
     */
    public function edit(Receita $receita)
    {
        return view('receita.insertveneno');

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
