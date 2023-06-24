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

class PulvVenenoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request, Receita $receita)
    {
        // Busca o agrotóxico cadastrado
        $agrotoxico = Agrotoxico::find($request->agrotoxico_id);

        // Cria um novo pulv_veneno associado à receita e ao agrotóxico
        $pulvVeneno = new PulvVeneno;
        $pulvVeneno->receita_id = $receita->id;
        $pulvVeneno->agrotoxico_id = $agrotoxico->id;
        $pulvVeneno->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pulvveneno  $pulvveneno
     * @return \Illuminate\Http\Response
     */
    public function show(pulvveneno $pulvveneno)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pulvveneno  $pulvveneno
     * @return \Illuminate\Http\Response
     */
    public function edit(pulvveneno $pulvveneno)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pulvveneno  $pulvveneno
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, pulvveneno $pulvveneno)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pulvveneno  $pulvveneno
     * @return \Illuminate\Http\Response
     */
    public function destroy(pulvveneno $pulvveneno)
    {
        //
    }
}
