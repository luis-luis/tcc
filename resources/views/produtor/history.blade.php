@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-md-7">
        <h2 class="featurette-heading">Agronote</h2>
        <p class="lead" text->Consulte despesas anteriores</p>
    </div>
</div>
<form method="post" action="{{route('produtor.showhistory')}}">
    <div class="container py-3">
        @csrf
        <div class="mb-3">
            <label class="form-label">Descrição</label>
            <input type="text" class="form-control" id="id" name="id">
        </div>
            <button type="submit" class="btn btn-success col-1 ml-1">Pesquisar</button>
            <a href="{{route('site.home')}}" type="button" class="btn btn-primary col-1 ml-1">
                Voltar
            </a>
        </div>
    </div>
</form>
    @endsection