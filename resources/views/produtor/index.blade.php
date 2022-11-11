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
            <label class="form-label">Descrição</label>
            <input type="text" class="form-control" id="nome_despesa" name="nome_despesa">
        </div>
        <div class="mb-3">
            <label for="phone">Valor da despesa</label>
            <input type="number" class="form-control" id="valor_despesa" name="valor_despesa">
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
