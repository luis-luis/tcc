@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-7">
            <h2 class="featurette-heading">Agronote</h2>
            <p class="lead">Solicite os produtos</p>
        </div>
    </div>
    <form action="{{route('produtor.cotacaoinsert')}}">
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
                            <th scope="col">Cod. Produto</th>
                            <th scope="col">Nome produto</th>
                            <th scope="col">Preço</th>
                            <th scope="col">Quantidades disponíveis</th>
                            <th scope="col">Quantidade</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($produtos as $produto)
                        <tr>
                            <th scope="row" id="idproduto">{{ $produto->id }}</th>
                            <td name="nome_produto">{{ $produto->nome_produto }}</td>
                            <td name="valor_produto">R$ {{ $produto->valor_produto }}</td>
                            <td name="qtd_produto">{{ $produto->qtd_produto }}</td>
                            <th>
                                <input class="form-control" type="number" name="produto[{{$produto->id}}]" max="{{$produto->qtd_produto}}" min="0" value="0" maxlength="5">
                            </th>
                            <th>

                            </th>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-1 ml-1">
                <button type="submit" class="btn btn-success">Salvar</button>
            </div>
            <div class="col-1 ml-1">
                <a href="{{ route('produtor.mostrarlojista') }}" type="button" class="btn btn-primary">
                    Voltar
                </a>
            </div>
        </div>
    </form>
</div>


@endsection