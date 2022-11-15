@extends('layouts.app')

@section('content')

<div class="container">
    <div class="col-md-7">
        <h2 class="featurette-heading">Agronote</h2>
        <p class="lead" text->Preencha abaixo os dados da sua nova receita!</p>
    </div>
</div>
<form method="post" action="">
    <div class="container py-3">
        @csrf
        <div class="row">
            <div class="col-5 mb-3">
                <label class="form-label">Veneno a ser utilizado: </label>
                <input type="text" class="form-control" id="veneno" name="veneno">
            </div>
            <div class="col-5 mb-3">
                <label class="form-label">Quantidade veneno (em litros)</label>
                <input type="number" class="form-control" id="qtdv" name="qtdv">
            </div>
        </div>
        <div class="row">
            <button type="submit" class="btn btn-success col-1 ml-1">Salvar</button>
            <a href="{{route('receita.show')}}" type="button" class="btn btn-primary col-1 ml-1">
                Voltar
            </a>
            <button type="submit" class="btn btn-danger col-1 ml-1">Adicionar veneno</button>
        </div>
    </div>
</form>

@endsection

<!-- <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" 
aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
<rect width="100%" height="75%" fill="#777"/>
</svg> -->