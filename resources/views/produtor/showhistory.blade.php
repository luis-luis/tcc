@extends('layouts.app')

@section('content')
<div class="container">

    <!-- START THE FEATURETTES -->

    <hr class="featurette-divider">

    <div class="row featurette">
        <div class="container">
            <div class="col-md-7">
                <h2 class="featurette-heading">Agronote</h2>
                <p class="lead" text->Consulte suas despesas</p>
            </div>
        </div>

        <!-- Listagem da despesa-->
        <script>console.log($dados)</script>
        <ul class="list-group list-group-flush">
            <li class="list-group-item"><b>Nome despesa:<b> {{$dados->nome_despesa}}</li>
            <li class="list-group-item"><b>Valor:<b> {{$dados->valor_despesa}}</li>
            <li class="list-group-item"><b>Data:<b> {{$dados->data_despesa}}</li>
        </ul>
    </div>
    @endsection