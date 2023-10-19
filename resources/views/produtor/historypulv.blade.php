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
        <a href="{{route('site.home')}}" type="button" class="btn btn-primary col-1 ml-1">
            Voltar
        </a>
    </div>
    </div>
</form>

</div>
<div class="container">
    <div class="row">
        <div>
            <div class="mb-3">
                <div class="mb-3">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Nº Pulverização</th>
                                <th scope="col">Cultura</th>
                                <th scope="col">Data pulverização</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($historypulv as $pulv)
                            <tr>
                                <td scope="row" name="idreceitas">{{ $pulv->idreceitas }}</td>
                                <td name="nome_pessoa">{{ $pulv->cult }}</td>
                                <td name="data_receita">{{ $pulv->data_receita }}</td>
                                <td>
                                    <button class="btn btn-secondary" data-toggle="modal" data-target="#pulv{{$pulv->idreceitas}}">Detalhes da pulverização</button>
                                    <div class="modal fade" tabindex="-1" id="pulv{{$pulv->idreceitas}}" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-xl" role="document">
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
                                                                <th></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($pulv->pulvVeneno as $a)
                                                            <tr>
                                                                <td scope="row">{{ $pulv->idreceitas }}</td>
                                                                <td scope="row">{{ $pulv->pessoa->nome_pessoa }}</td>
                                                                <td scope="row">{{ $pulv->pessoa->tel_pessoa }}</td>
                                                                <td scope="row">{{ $pulv->tanque_veneno }}</td>
                                                                <td scope="row">{{ $pulv->area_app }}</td>
                                                                <td scope="row">{{ $pulv->cult }}</td>
                                                                <td scope="row">{{ $a->agrotoxico->nome_agrotoxico }}</td>
                                                                <td scope="row">{{ $a->qtd_veneno }}</td>
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
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection