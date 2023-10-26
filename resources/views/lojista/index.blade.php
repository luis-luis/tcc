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
        @if(session("success"))
        <div class="alert alert-success" role="alert">
            {{session("success")}}
        </div>
        @endif
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
            <label class="form-label">Valor do produto</label>
            <input type="text" data-affixes-stay="true" data-thousands="" data-decimal="."
            class="form-control currency" placeholder="R$ 9.999,99" maxlength="10" id="valor_produto" 
            name="valor_produto" step="0.01" min="0.01">
        </div>
        <div class="mb-3">
            <label class="form-label">Quantidade</label>
            <input type="text" class="form-control" id="quantidade_produto" name="quantidade_produto" pattern="\d*" maxlength="9" 
            onkeypress="if (!isNaN(String.fromCharCode(window.event.keyCode))) return true; else return false;">
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