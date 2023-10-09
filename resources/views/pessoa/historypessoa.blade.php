@extends('layouts.app')

@section('content')

<div class="container">
    <div class="col-md-7">
        <h2 class="featurette-heading">Agronote</h2>
        <p class="lead" text->Clientes cadastrados</p>
    </div>
</div>

<form method="post" action="#">
    <div class="container py-3">
        @csrf
        <div class="mb-3">
            <label class="form-label">Cliente</label>
            <input type="text" class="form-control" id="nome_cliente" name="nome_cliente">
        </div>
        <button type="submit" class="btn btn-success col-1 ml-1">Pesquisar</button>
        <a href="{{route('site.home')}}" type="button" class="btn btn-primary col-1 ml-1">
            Voltar
        </a>
    </div>
    </div>
    <form action="">
        <div class="container py-3">
            <div class="mb-3">
                @if(session("success"))
                <div class="alert alert-success" role="alert">
                    {{session("success")}}
                </div>
                @endif
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Nome do cliente</th>
                            <th scope="col">Telefone do cliente</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pessoas as $pessoa)
                        <tr>
                            <td scope="row">{{ $pessoa->nome_pessoa }}</td>
                            <td scope="row">{{ $pessoa->tel_pessoa }}</td>
                            <td><a href="{{route('pessoa.editpessoa', $pessoa->idpessoa)}}" type="button" class="btn btn-warning">Editar cadastro</a></td>
                            <td><a href="{{route('pessoa.destroypessoa', $pessoa->idpessoa)}}" type="button" class="btn btn-danger" onclick="javascript:return confirm('Você tem certeza que deseja excluir esse produto?');">Excluir cadastro</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        </div>
    </form>
</form>


</div>

@endsection