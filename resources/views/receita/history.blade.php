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

</div>
<div class="container">
    <div class="row">
        <div>
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
                                <th scope="col">Nº Pulverização</th>
                                <th scope="col">Cliente</th>
                                <th scope="col">Data pulverização</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($receitas as $pulv)
                            <tr>
                                <td scope="row" name="idreceitas">{{ $pulv->idreceitas }}</td>
                                <td name="nome_pessoa">{{ $pulv->pessoa->nome_pessoa }}</td>
                                <td name="data_receita">{{ $pulv->data_receita }}</td>
                                <td name="tel_pessoa">{{ $pulv->tel_pessoa }}</td>
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
                                                                <td scope="row">{{ $pulv->qtd_veneno }}</td>
                                                                <td>
                                                                    <a href="{{route('receita.removeagrotoxico', ['idreceitas'=>$pulv->idreceitas ,'idagrotoxico'=>$a->cod_agrotoxico])}}" type="button" class="btn btn-danger" onclick="javascript:return confirm('Você tem certeza que deseja remover este agrotóxico?');">Remover Agrotóxico</a>
                                                                </td>
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
                                <td>
                                    <button class="btn btn-success" data-toggle="modal" data-target="#pulverizacao{{$pulv->idreceitas}}">Associar pulverização</button>
                                    <div class="modal fade" tabindex="-1" id="pulverizacao{{$pulv->idreceitas}}" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Associar pulverização</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form method="post" action="{{ route('receita.associarusuario', ['idreceitas' => $pulv->idreceitas])}}">
                                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                    <div class="modal-body">
                                                        <table class="table table-striped">
                                                            <tbody>
                                                                <tr>
                                                                    <td>Nome cliente</td>
                                                                    <td scope="row">
                                                                        <select name="id" class="form-control">
                                                                            <option value="" selected>Selecione o Cliente</option>
                                                                            @foreach($user as $cliente)
                                                                            <option value="{{$cliente->id}}">{{$cliente->name}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-success">Associar</button>
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="row">
                                        <div>
                                            <a href="{{ route('receita.removerassociacao', ['idreceitas' => $pulv->idreceitas]) }}" type="button" class="btn btn-danger" onclick="javascript:return confirm('Você tem certeza que deseja remover o vínculo dessa pulverização?');">
                                                Remover associação cliente.
                                            </a>
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