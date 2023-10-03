@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-md-7">
        <h2 class="featurette-heading">Agronote</h2>
        <p class="lead" text->Consulte suas pulverizações</p>
    </div>
</div>
<form method="post" action="">
    <div class="container py-3">
        @csrf
        <div class="mb-3">
            <label class="form-label">Produtor</label>
            <input type="text" class="form-control" id="nome_cliente" name="nome_cliente">
        </div>
        <button type="submit" class="btn btn-success col-1 ml-1">Pesquisar</button>
        <a href="{{route('receita.history')}}" type="button" class="btn btn-primary col-1 ml-1">
            Voltar
        </a>
    </div>
    </div>
</form>

<!-- Listagem da pulverização-->

<!-- <div class="container py-3">
    <div class="col-md-7">
        <p class="lead" text->Pulverizações anteriores</p>
    </div>
    @foreach($dados as $pulv)
    <ul class="list-group list-group-flush">
        <li class="list-group-item"><b>Id receita: <b>{{$pulv->idreceitas}} </li>
        <li class="list-group-item"><b>Cliente: <b>{{$pulv->nome_pessoa}} </li>
        <li class="list-group-item"><b>Telefone: <b>{{$pulv->tel_pessoa}} </li>
        <li class="list-group-item"><b>Tamanho do tanque veneno: <b>{{$pulv->tanque_veneno}} </li>
        <li class="list-group-item"><b>Data do registro: <b>{{$pulv->data_receita}} </li>
        <li class="list-group-item"><b>Tamanho da área de aplicacao: <b>{{$pulv->area_app}} </li>
        <li class="list-group-item"><b>Cultura aplicada: <b>{{$pulv->cult}} </li>
        <li class="list-group-item"><b>Agrotoxicos aplicados: <b>{{$pulv->nome_agrotoxico}} </li>
        <li class="list-group-item"><b>Quantidade de agrotóxicos aplicada: <b>{{$pulv->qtd_veneno}} </li>
        <br>
    </ul>
    @endforeach -->

</div>
<div class="container">
    <div class="row">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Nº Pulverização</th>
                    <th scope="col">Cliente</th>
                    <th scope="col">Data pulverização</th>
                    <th scope="col">Telefone </th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($dados as $pulv)
                <tr>
                    <td scope="row" name="idreceitas">{{ $pulv->idreceitas }}</td>
                    <td name="nome_pessoa">{{ $pulv->nome_pessoa }}</td>
                    <td name="data_receita">{{ $pulv->data_receita }}</td>
                    <td name="tel_pessoa">{{ $pulv->tel_pessoa }}</td>
                    <td>
                        <button class="btn btn-secondary" data-toggle="modal" data-target="#pulv{{$pulv->idreceitas}}">Detalhes da pulverização</button>
                        <div class="modal fade" tabindex="-1" id="pulv{{$pulv->idreceitas}}" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Detalhes da pulverização</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Nº Pulverização</th>
                                                    <th scope="col">Nome cliente</th>
                                                    <th scope="col">Telefone</th>
                                                    <th scope="col">Tamanho tanque pulverização</th>
                                                    <th scope="col">Tamanho área (em alqueires)</th>
                                                    <th scope="col">Cultura aplicada</th>
                                                    <th scope="col">Agrotoxicos aplicados</th>
                                                    <th scope="col">Quantidade aplicada (em Litros)</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <tr>
                                                    <td scope="row">{{ $pulv->idreceitas }}</td>
                                                    <td scope="row">{{ $pulv->nome_pessoa }}</td>
                                                    <td scope="row">{{ $pulv->tel_pessoa }}</td>
                                                    <td scope="row">{{ $pulv->tanque_veneno }}</td>
                                                    <td scope="row">{{ $pulv->area_app }}</td>
                                                    <td scope="row">{{ $pulv->cult }}</td>
                                                    <td scope="row">{{ $pulv->nome_agrotoxico }}</td>
                                                    <td scope="row">{{ $pulv->qtd_veneno }}</td>
                                                </tr>

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
                    <td><a href="" type="button" class="btn btn-danger">Associar Pulverização</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection