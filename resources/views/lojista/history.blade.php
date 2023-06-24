@extends('layouts.app')

@section('content')

<div class="container">
    <div class="col-md-7">
        <h2 class="featurette-heading">Agronote</h2>
        <p class="lead" text->Produtos cadastros</p>
    </div>
</div>

<form method="post" action="{{route('lojista.history')}}">
    <div class="container py-3">
        @csrf
        <div class="mb-3">
            <label class="form-label">Produto</label>
            <input type="text" class="form-control" id="nome_produto" name="nome_produto">
        </div>
        <button type="submit" class="btn btn-success col-1 ml-1">Pesquisar</button>
        <a href="{{route('site.home')}}" type="button" class="btn btn-primary col-1 ml-1">
            Voltar
        </a>
    </div>
    </div>
</form>

<!-- Listagem dos produtos-->

    <div class="container py-3">
    <div class="col-md-7">
        <p class="lead" text->Produtos</p>
    </div>
    @foreach($produtos as $produto)
        <ul class="list-group list-group-flush">
            <li class="list-group-item"><b>Marca: <b>{{$produto->marca_produto}} </li>
            <li class="list-group-item"><b>Nome: <b>{{$produto->nome_produto}} </li>
            <li class="list-group-item"><b>Descrição: <b>{{$produto->descricao_produto}} </li>
            <li class="list-group-item"><b>Valor: <b>{{$produto->valor_produto}} </li>
            <br>
        </ul>
    @endforeach

</div>

    @endsection