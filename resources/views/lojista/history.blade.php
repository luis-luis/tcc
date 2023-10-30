@extends('layouts.app')

@section('content')

<div class="container">
    <div class="col-md-7">
        <h2 class="featurette-heading">Agronote</h2>
        <p class="lead" text->Produtos cadastrados</p>
    </div>
</div>

<form method="post" action="{{route('lojista.history')}}">
    <div class="container py-3">
        @csrf
        <div class="mb-3">
            <label class="form-label">Produto</label>
            <input type="text" class="form-control" id="nome_produto" name="nome_produto">
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
                            <th scope="col">Nome do produto</th>
                            <th scope="col">Marca do produto</th>
                            <th scope="col">Preço produto</th>
                            <th scope="col">Quantidade</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($produtos as $produto)
                        <tr>
                            <td scope="row">{{ $produto->nome_produto }}</td>
                            <td scope="row">{{ $produto->marca_produto }}</td>
                            <td scope="row">R$ {{ number_format ($produto->valor_produto, 2,",",".") }}</td>
                            <td scope="row">{{ $produto->qtd_produto }}</td>
                            <td><a href="{{route('lojista.editproduto', $produto->id)}}" type="button" class="btn btn-warning">Editar produto</a></td>
                            <td><a href="{{route('lojista.destroyproduto', $produto->id)}}" type="button" class="btn btn-danger" onclick="javascript:return confirm('Você tem certeza que deseja excluir esse produto?');">Excluir produto</a></td>
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