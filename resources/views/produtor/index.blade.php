@extends('layouts.app')

@section('content')


<div class="container">
    <div class="col-md-7">
        <h2 class="featurette-heading">Agronote</h2>
        <p class="lead" text->Lance suas despesas da safra</p>
    </div>
</div>
<form method="post" action="{{route('produtor.insert')}}">
    <div class="container py-3">
        @csrf
        <div class="mb-3">
            <label class="form-label">Despesa</label>
            <input type="text" class="form-control" id="nome_despesa" name="nome_despesa">
        </div>
        <div class="mb-3">
            <label class="form-label">Valor da despesa</label>
            <input type="text" placeholder="R$ 9.999,99" maxlength="15" data-prefix="R$ " data-affixes-stay="true" data-thousands="." data-decimal=","
            class="form-control currency" id="valor_despesa" name="valor_despesa" step="0.01" min="0.01">
        </div>
        <div class="mb-3">
            <label class="form-label">Descrição despesa</label>
            <input type="text" class="form-control" id="descricao_despesa" name="descricao_despesa">
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
