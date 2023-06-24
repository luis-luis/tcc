@extends('layouts.app')

@section('content')


<div class="container">
    <div class="col-md-7">
        <h2 class="featurette-heading">Agronote</h2>
        <p class="lead" text->Preencha abaixo os dados da sua nova receita!</p>
    </div>
</div>
<form method="post" action="{{route('receita.insertveneno')}}">
    <div class="container py-3">
        @csrf
        <div class="mb-3">
            <label class="form-label">Nome do Agricultor</label>
            <input type="text" class="form-control" id="cliente" name="cliente">
        </div>
        <div class="mb-3">
            <label for="phone">Qual o telefone do agricultor?</label>
            <input type="tel" class="form-control" id="phone" name="phone" maxlength="15" placeholder="(99)99999-9999">
        </div>
        <div class="mb-3">
            <label class="form-label">Qual a cultura onde será aplicada?</label>
            <input type="text" class="form-control" id="cult" name="cult">
        </div>
        <div class="mb-3">
            <label class="form-label">Tamanho da área de aplicação (em alqueires)</label>
            <input type="number" class="form-control" id="area_app" name="area_app">
        </div>
        <div class="mb-3">
            <label class="form-label">Tamanho do tanque de pulverização (em litros)</label>
            <input type="number" class="form-control" id="pulv" name="pulv">
        </div>
        <div class="row">
            <button type="submit" class="btn btn-success col-1 ml-1">Avançar</button>
            <a href="{{route('site.home')}}" type="button" class="btn btn-primary col-1 ml-1">
                Voltar
            </a>
        </div>
    </div>
</form>

@endsection
