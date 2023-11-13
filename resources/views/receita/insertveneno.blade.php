@extends('layouts.app')

@section('content')

<div class="container">
    <div class="col-md-7">
        <h2 class="featurette-heading">Agronote</h2>
        <p class="lead">Preencha abaixo os dados da sua nova receita!</p>
    </div>
</div>

<form method="post" action="{{route('receita.saveveneno')}}">
    @csrf
    <div class="container py-3">
        <div id="camposVeneno">
            <div class="mb-3">
                @if( isset($message) )
                <div class="alert alert-success" role="alert">
                    {{ $message }}
                </div>
                @endif
                <label for="agrotoxico">Agrotoxico a ser utilizado:</label>
                <select name="agrotoxicos[][idagrotoxico]" class="form-control">
                    <option value="" selected disabled>Selecione o agrotoxico</option>
                    @foreach ($agrotoxicos as $agrotoxico)
                    <option value="{{ $agrotoxico->idagrotoxico }}">{{ $agrotoxico->nome_agrotoxico }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-5 mb-3">
                <label class="form-label">Quantidade de veneno ( Em mililitros (ML) )</label>
                <input type="number" class="form-control" id="quantidade" name="quantidade" placeholder="Ex: 1150 (informar apenas números)">
            </div>
        </div>
        <div class="row">
            <button type="submit" class="btn btn-success col-1 ml-1">Salvar</button>
            <a href="{{ route('receita.insert') }}" type="button" class="btn btn-primary col-1 ml-1">
                Voltar
            </a>
        </div>
</form>

@endsection