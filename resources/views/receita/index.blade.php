@extends('layouts.app')

@section('content')

<!-- <div id="myCarousel" class="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <div class="fundo-cinza">
                <div class="container">
                    <div class="carousel-caption">
                        <h1>
                            Nova receita
                        </h1>
                        <p>
                            Preencha os campos abaixo
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> -->
<div class="container">
    <div class="col-md-7">
        <h2 class="featurette-heading">Agronote</h2>
        <p class="lead" text->Preencha abaixo os dados da sua nova receita!</p>
    </div>
</div>
<form method="post" action="{{route('receita.insert')}}">
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
            <div class="col-5 mb-3">
                <label class="form-label">Veneno a ser utilizado: </label>
                <input type="text" class="form-control" id="veneno" name="veneno">
            </div>
            <div class="col-5 mb-3">
                <label class="form-label">Quantidade veneno (em litros)</label>
                <input type="number" class="form-control" id="qtdv" name="qtdv">
            </div>
            <!-- <div class="col-5 mb-3">
                <label class="form-label">Veneno a ser utilizado #2</label>
                <input type="text" class="form-control" id="veneno2" name="veneno2">
            </div>
            <div class="col-5 mb-3">
                <label class="form-label">Quantidade veneno #2 (em litros)</label>
                <input type="number" class="form-control" id="qtdv2" name="qtdv2">
            </div>
            <div class="col-5 mb-3">
                <label class="form-label">Veneno a ser utilizado #3</label>
                <input type="text" class="form-control" id="veneno3" name="veneno3">
            </div>
            <div class="col-5 mb-3">
                <label class="form-label">Quantidade veneno #3 (em litros)</label>
                <input type="number" class="form-control" id="qtdv3" name="qtdv3">
            </div>
            <div class="col-5 mb-3">
                <label class="form-label">Veneno a ser utilizado #4</label>
                <input type="text" class="form-control" id="veneno4" name="veneno4">
            </div>
            <div class="col-5 mb-3">
                <label class="form-label">Quantidade veneno #4 (em litros)</label>
                <input type="number" class="form-control" id="qtdv4" name="qtdv4">
            </div>
            <div class="col-5 mb-3">
                <label class="form-label">Veneno a ser utilizado #5</label>
                <input type="text" class="form-control" id="veneno5" name="veneno5">
            </div>
            <div class="col-5 mb-3">
                <label class="form-label">Quantidade veneno #5 (em litros)</label>
                <input type="number" class="form-control" id="qtdv5" name="qtdv5">
            </div> -->
        </div>
        <div class="row">
            <button type="submit" class="btn btn-success col-1 ml-1">Salvar</button>
            <a href="{{route('site.home')}}" type="button" class="btn btn-primary col-1 ml-1">
                Voltar
            </a>
        </div>
    </div>
</form>

@endsection

<!-- <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" 
aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
<rect width="100%" height="75%" fill="#777"/>
</svg> -->