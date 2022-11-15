@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-md-7">
        <h2 class="featurette-heading">Agronote</h2>
        <p class="lead" text->Consulte despesas anteriores</p>
    </div>
</div>
<form method="post" action="{{route('produtor.history')}}">
    <div class="container py-3">
        @csrf
        <div class="mb-3">
            <label class="form-label">Descrição</label>
            <input type="text" class="form-control" id="nome_despesa" name="nome_despesa">
        </div>
        <button type="submit" class="btn btn-success col-1 ml-1">Pesquisar</button>
        <a href="{{route('site.home')}}" type="button" class="btn btn-primary col-1 ml-1">
            Voltar
        </a>
    </div>
    </div>
</form>

<!-- Listagem da despesa-->

    <div class="container py-3">
    <div class="col-md-7">
        <p class="lead" text->Despesas anteriores</p>
    </div>
    @foreach($dados as $despesa)
        <ul class="list-group list-group-flush">
            <li class="list-group-item"><b>Despesa: <b>{{$despesa->nome_despesa}} </li>
            <li class="list-group-item"><b>Valor: <b>{{$despesa->valor_despesa}} </li>
            <li class="list-group-item"><b>Data: <b>{{$despesa->data_despesa}} </li>
        </ul>
    @endforeach

</div>
@endsection