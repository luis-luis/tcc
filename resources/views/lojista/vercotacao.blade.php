@extends('layouts.app')

@section('content')

<div class="container">
    <div class="col-md-7">
        <h2 class="featurette-heading">Agronote</h2>
        <p class="lead" text->Cotações a serem atendidas</p>
    </div>
</div>

<form method="post" action="">
    <div class="container py-3">
        @csrf
        <div class="mb-3">
            <label class="form-label">Cotação</label>
            <input type="text" class="form-control" id="nome_produto" name="nome_produto">
        </div>
        <button type="submit" class="btn btn-success col-1 ml-1">Pesquisar</button>
        <a href="{{route('site.home')}}" type="button" class="btn btn-primary col-1 ml-1">
            Voltar
        </a>
    </div>

</form>

<div class="container py-3">
    <div class="mb-3">
        @if(session("success"))
        <div class="alert alert-success" role="alert">
            {{session("success")}}
        </div>
        @endif
    <div class="mb-3">
        @if(session("erro"))
        <div class="alert alert-danger" role="alert">
            {{session("erro")}}
        </div>
        @endif
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Nome produtor</th>
                    <th scope="col">Cod. Cotação</th>
                    <th scope="col">Valor cotação</th>
                    <th scope="col">Itens da cotação</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cotacoes as $cotacao)
                <tr>
                    <td name="nome_produtor"> {{ $cotacao->user->name }}</td>
                    <td scope="row" name="idproduto">{{ $cotacao->idcotacoes }}</td>
                    <td name="valor_produto">R$ {{ $cotacao->valor_cotacao }}</td>
                    <td>
                        <button class="btn btn-secondary" data-toggle="modal" data-target="#cotacao{{$cotacao->idcotacoes}}">Visualizar itens da cotação</button>
                        <div class="modal fade" tabindex="-1" id="cotacao{{$cotacao->idcotacoes}}" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Detalhes da cotação</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Cod. Cotacao</th>
                                                    <th scope="col">Nome produto</th>
                                                    <th scope="col">Preço Unit.</th>
                                                    <th scope="col">Quantidade</th>
                                                    <th scope="col">Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($cotacao->itens as $pedido)
                                                <tr>
                                                    <td> {{ $pedido->cod_cotacao }} </td>
                                                    <td> {{ $pedido->produto->nome_produto }} </td>
                                                    <td> {{ $pedido->produto->valor_produto }} </td>
                                                    <td> {{ $pedido->qtd_produto }} </td>
                                                    <td> {{ $cotacao->cod_status }} </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td name="status">{{ $cotacao->status->status }}</td>
                    <td></td>
                    <td></td>
                    <td><a href="{{ route('lojista.atenderpedido', ['id' => $cotacao->idcotacoes]) }}" type="button" class="btn btn-success">Atender pedido</a></td>
                    <td><a href="{{ route('lojista.recusarpedido', ['id' => $cotacao->idcotacoes]) }}" type="button" class="btn btn-danger">Recusar pedido</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</div>


</div>

@endsection

