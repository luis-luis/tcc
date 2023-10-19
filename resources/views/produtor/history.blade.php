@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-md-7">
        <h2 class="featurette-heading">Agronote</h2>
        <p class="lead" text->Consulte despesas anteriores</p>
    </div>
</div>
<form method="post" action="{{route('produtor.history')}}">
    <div class="container py-3">
        @csrf
        <div class="mb-3">
            <label class="form-label">Descrição</label>
            <input type="text" class="form-control" id="nome_despesa" name="nome_despesa">
        </div>
        <button type="submit" class="btn btn-success col-1 ml-1">Pesquisar</button>
        <a href="{{route('site.home')}}" type="button" class="btn btn-primary col-1 ml-1">
            Voltar
        </a>
    </div>
    </div>
</form>

<!-- Listagem da despesa-->

</div>
<div class="container">
    <div class="row">
        <div>
            <div class="mb-3">
                <div class="mb-3">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Despesa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($dados as $despesa)
                            <tr>
                                <td scope="row" name="idreceitas">{{ $despesa->nome_despesa }}</td>
                                <td>
                                    <button class="btn btn-secondary" data-toggle="modal" data-target="#despesa{{$despesa->id}}">Detalhes da despesa</button>
                                    <div class="modal fade" tabindex="-1" id="despesa{{$despesa->id}}" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Detalhes da despesa</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <table class="table table-striped">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col">Despesa</th>
                                                                <th scope="col">Valor</th>
                                                                <th scope="col">Data</th>
                                                                <th scope="col">Detalhes despesa</th>
                                                                <th></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td scope="row">{{ $despesa->nome_despesa }}</td>
                                                                <td scope="row">{{ $despesa->valor_despesa }}</td>
                                                                <td scope="row">{{ $despesa->data_despesa }}</td>
                                                                <td scope="row">{{ $despesa->descricao_despesa }}</td>
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