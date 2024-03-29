@extends('layouts.app')

@section('content')


<div class="container">
    <div class="col-md-7">
        <h2 class="featurette-heading">Agronote</h2>
        <p class="lead" text->Preencha abaixo os dados da sua nova receita!</p>
    </div>
</div>
<form method="post" action="{{route('receita.insertveneno')}}">
    <div class="container py-3">
        @csrf
        <div class="mb-3">
        <label for="agrotoxico">Agricultor</label>
        <select name="idpessoa" class="form-control">
                    <option value="" selected disabled>Selecione o Agricultor</option>
                    @foreach ($pessoas as $pessoa)
                    <option value="{{ $pessoa->idpessoa }}">{{ $pessoa->nome_pessoa }}</option>
                    @endforeach 
                </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Qual a cultura onde será aplicada?</label>
            <input type="text" class="form-control" id="cult" name="cult" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Tamanho da área de aplicação (em alqueires)</label>
            <input type="text" class="form-control" id="area_app" name="area_app" maxlength="6"
            onkeypress="if (!isNaN(String.fromCharCode(window.event.keyCode))) return true; else return false;" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Tamanho do tanque de pulverização (em litros)</label>
            <input type="text" class="form-control" id="tanque_veneno" name="tanque_veneno" pattern="\d*" maxlength="6"
            onkeypress="if (!isNaN(String.fromCharCode(window.event.keyCode))) return true; else return false;" required>
        </div>
        <div class="row">
            <button type="submit" class="btn btn-success col-1 ml-1">Avançar</button>
            <a href="{{route('site.home')}}" type="button" class="btn btn-primary col-1 ml-1">
                Voltar
            </a>
        </div>
    </div>
</form>

@endsection
