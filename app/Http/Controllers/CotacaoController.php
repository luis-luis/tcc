<?php

namespace App\Http\Controllers;

use App\Models\cotacao;
use Illuminate\Http\Request;

class CotacaoController extends Controller
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\cotacao  $cotacao
     * @return \Illuminate\Http\Response
     */
    public function show(cotacao $cotacao)
    {
        return view('');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\cotacao  $cotacao
     * @return \Illuminate\Http\Response
     */
    public function edit(cotacao $cotacao)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\cotacao  $cotacao
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, cotacao $cotacao)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\cotacao  $cotacao
     * @return \Illuminate\Http\Response
     */
    public function destroy(cotacao $cotacao)
    {
        //
    }
}