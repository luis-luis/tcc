@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-7">
            <h2 class="featurette-heading">Agronote</h2>
            <p class="lead">Consulte os produtos solicitados</p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-7">
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
                                <th scope="col">Cod. Cotacao</th>
                                <th scope="col">Status</th>
                                <th scope="col">Valor Total</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dados as $cotacao)
                            <tr>
                                <td scope="row" name="idproduto">{{ $cotacao->idcotacoes }}</td>
                                <td name="nome_produto">{{ $cotacao->status->status }}</td>
                                <td name="valor_produto">{{ $cotacao->valor_cotacao }}</td>
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
                                                            @foreach($cotacao->itens as $item)
                                                            <tr>
                                                                <td scope="row">{{ $item->cod_cotacao }}</td>
                                                                <td scope="row">{{ $item->produto->nome_produto }}</td>
                                                                <td scope="row">{{ $item->produto->valor_produto }}</td>
                                                                <td scope="row">{{ $item->qtd_produto }}</td>
                                                                <td scope="row">{{ $cotacao->cod_status }}</td>
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
                                <td><a href="{{ route('produtor.cancelarpedido', ['id' => $cotacao->idcotacoes]) }}" type="button" class="btn btn-danger">Cancelar pedido</a></td>
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

        </div>


        @endsection