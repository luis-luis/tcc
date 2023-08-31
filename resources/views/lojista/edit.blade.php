@extends('layouts.app')

@section('content')


<div class="container">
    <div class="col-md-7">
        <h2 class="featurette-heading">Agronote</h2>
        <p class="lead" text->Edite as informações do produto</p>
    </div>
</div>
<form method="post" action="{{route('lojista.updateproduto', $produto->id)}}">
    <div class="container py-3">
        @if(session("success"))
        <div class="alert alert-success" role="alert">
            {{session("success")}}
        </div>
        @endif
        @csrf
        <div class="mb-3">
            <label class="form-label">Marca do produto</label>
            <input type="text" class="form-control" id="marca_produto" name="marca_produto" value="{{$produto->marca_produto}}">
        </div>
        <div class="mb-3">
            <label class="form-label">Nome do produto</label>
            <input type="text" class="form-control" id="nome_produto" name="nome_produto" value="{{$produto->nome_produto}}">
        </div>
        <div class="mb-3">
            <label class="form-label">Descrição do produto</label>
            <input type="text" class="form-control" id="descricao_produto" name="descricao_produto" value="{{$produto->descricao_produto}}">
        </div>
        <div class="mb-3">
            <label for="phone">Valor do produto</label>
            <input type="number" class="form-control" id="valor_produto" name="valor_produto" value="{{$produto->valor_produto}}">
        </div>
        <div class="mb-3">
            <label for="phone">Quantidade</label>
            <input type="number" class="form-control" id="quantidade_produto" name="quantidade_produto" value="{{$produto->qtd_produto}}">
        </div>
        <div class="row">
            <button type="submit" class="btn btn-success col-1 ml-1">Atualizar</button>
            <a href="{{route('site.home')}}" type="button" class="btn btn-primary col-1 ml-1">
                Voltar
            </a>
        </div>
    </div>
</form>

@endsection