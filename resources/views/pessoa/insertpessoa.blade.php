@extends('layouts.app')

@section('content')


<div class="container">
    <div class="col-md-7">
        <h2 class="featurette-heading">Agronote</h2>
        <p class="lead" text->Preencha abaixo os dados do cliente!</p>
    </div>
</div>
<form method="post" action="{{route('pessoa.insert')}}">
    <div class="container py-3">
        @csrf
        <div class="mb-3">
            @if(session("success"))
            <div class="alert alert-success" role="alert">
                {{session("success")}}
            </div>
            @endif
            <div class="mb-3">
                <label class="form-label">Nome do Agricultor</label>
                <input type="text" class="form-control" id="cliente" name="cliente">
            </div>
            <div class="mb-3">
                <label for="phone">Qual o telefone do agricultor?</label>
                <input type="tel" class="form-control" id="phone" name="phone" maxlength="15" placeholder="(99)99999-9999">
            </div>
            <div class="mb-3">
                <label for="">Endereço</label>
                <input type="text" class="form-control" id="endereco" name="endereco">
            </div>
            <div class="mb-3">
                <label for="">Cidade</label>
                <select name="cidades" class="form-control">
                    <option value="" selected disabled>Selecione a cidade</option>
                    @foreach ($cidades as $id_cidade => $nome_cidade)
                    <option value="{{ $id_cidade }}">{{ $nome_cidade }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="">Estado</label>
                <select name="estados" class="form-control">
                    <option value="" selected disabled>Selecione o estado</option>
                    @foreach ($estados as $id_estado => $nome_estado)
                    <option value="{{ $id_estado }}">{{ $nome_estado }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="">Pais</label>
                <select name="paises" class="form-control">
                    <option value="" selected disabled>Selecione o pais</option>
                    @foreach ($paises as $id_pais => $nome_pais)
                    <option value="{{ $id_pais }}">{{ $nome_pais }}</option>
                    @endforeach
                </select>
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