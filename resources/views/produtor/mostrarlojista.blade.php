@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-7">
            <h2 class="featurette-heading">Agronote</h2>
            <p class="lead">Selecione com qual fornecedor que deseja realizar o pedido.</p>
        </div>
    </div>
    <form action="{{route('produtor.cotacao')}}">
        <div class="row">
            <div class="col-md-7">
                @if(session("erro"))
                <div class="alert alert-danger" role="alert">
                    {{session("erro")}}
                </div>
                @endif
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Fornecedor</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-1 ml-1">
                <button type="submit" class="btn btn-success">Salvar</button>
            </div>
            <div class="col-1 ml-1">
                <a href="{{ route('site.home') }}" type="button" class="btn btn-primary">
                    Voltar
                </a>
            </div>

        </div>
    </form>
</div>


@endsection