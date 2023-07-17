@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-md-7">
        <h2 class="featurette-heading">Agronote</h2>
        <p class="lead" text->Consulte suas pulverizações anteriores</p>
    </div>
</div>
<form method="post" action="">
    <div class="container py-3">
        @csrf
        <div class="mb-3">
            <label class="form-label">Produtor</label>
            <input type="text" class="form-control" id="nome_cliente" name="nome_cliente">
        </div>
        <button type="submit" class="btn btn-success col-1 ml-1">Pesquisar</button>
        <a href="{{route('receita.history')}}" type="button" class="btn btn-primary col-1 ml-1">
            Voltar
        </a>
    </div>
    </div>
</form>

<!-- Listagem da despesa-->

    <div class="container py-3">
    <div class="col-md-7">
        <p class="lead" text->Pulverizações anteriores</p>
    </div>
    @foreach($dados as $pulv)
        <ul class="list-group list-group-flush">
            <li class="list-group-item"><b>Id receita: <b>{{$pulv->idreceitas}} </li>
            <li class="list-group-item"><b>Cliente: <b>{{$pulv->nome_pessoa}} </li>
            <li class="list-group-item"><b>Telefone: <b>{{$pulv->tel_pessoa}} </li>
            <li class="list-group-item"><b>Tamanho do tanque veneno: <b>{{$pulv->tanque_veneno}} </li>
            <li class="list-group-item"><b>Data do registro: <b>{{$pulv->data_receita}} </li>
            <li class="list-group-item"><b>Tamanho da área de aplicacao: <b>{{$pulv->area_app}} </li>
            <li class="list-group-item"><b>Cultura aplicada: <b>{{$pulv->cult}} </li>
            <li class="list-group-item"><b>Agrotoxicos aplicados: <b>{{$pulv->nome_agrotoxico}} </li>
            <li class="list-group-item"><b>Quantidade de agrotóxicos aplicada: <b>{{$pulv->qtd_veneno}} </li>
            <br>
        </ul>
    @endforeach

</div>
@endsection