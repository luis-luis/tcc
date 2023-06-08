@extends('layouts.app')

@section('content')


<div class="container">
    <div class="col-md-7">
        <h2 class="featurette-heading">Agronote</h2>
        <p class="lead" text->Cadastre seus produtos</p>
    </div>
</div>
<form method="post" action="{{route('lojista.insertproduto')}}">
    <div class="container py-3">
        @csrf
        <div class="mb-3">
            <label class="form-label">Marca do produto</label>
            <input type="text" class="form-control" id="marca_produto" name="marca_produto">
        </div>
        <div class="mb-3">
            <label class="form-label">Nome do produto</label>
            <input type="text" class="form-control" id="nome_produto" name="nome_produto">
        </div>
        <div class="mb-3">
            <label class="form-label">Descrição do produto</label>
            <input type="text" class="form-control" id="descricao_produto" name="descricao_produto">
        </div>
        <div class="mb-3">
            <label for="phone">Valor do produto</label>
            <input type="number" class="form-control" id="valor_produto" name="valor_produto">
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