<?php

namespace App\Http\Controllers;

use App\Models\Despesa;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Validator;

class DespesaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('produtor.index');
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
    public function insert(Request $request, Despesa $despesa)
    {
        $validator = Validator::make($request->all(), []);

        if ($validator->fails()) {
        }

        try {
            $despesa->nome_despesa = $request->nome_despesa;
            $despesa->valor_despesa = $request->valor_despesa;
            // $despesa->date("YYYY-MM-DD") -> $request->data;
            $despesa->data_despesa = Carbon::now();
            $despesa->save();

            return redirect()->route('site.home');
        } catch (\Exception $e) {
            echo $e->getMessage();
        };
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Despesa  $despesa
     * @return \Illuminate\Http\Response
     */
    public function show(Despesa $despesa)
    {
        return view ('produtor.history');
    }

    public function historico(Despesa $despesa)
    {    

        $despesa = Despesa::all();

        return view('produtor.showhistory', ['dados' => $despesa]);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Despesa  $despesa
     * @return \Illuminate\Http\Response
     */
    public function edit(Despesa $despesa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Despesa  $despesa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Despesa $despesa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Despesa  $despesa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Despesa $despesa)
    {
        //
    }
}