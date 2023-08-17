@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-7">
            <h2 class="featurette-heading">Agronote</h2>
            <p class="lead">Consulte os produtos solicitados</p>
        </div>
    </div>
    <form action="teste123">
        <div class="row">
            <div class="col-md-7">
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
                        @foreach ($dados as $cotacao)
                        <tr>
                            <th scope="row" name="idproduto">{{ $cotacao->id }}</th>
                            <td name="nome_produto">{{ $cotacao->nome_produto }}</td>
                            <td name="valor_produto">{{ $cotacao->valor_produto }}</td>
                            <td name="qtd_produto">{{ $cotacao->qtd_produto }}</td>
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
                <a href="{{ route('site.home') }}" type="button" class="btn btn-primary">
                    Voltar
                </a>
            </div>
        </div>
    </form>
</div>


@endsection