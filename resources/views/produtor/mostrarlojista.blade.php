@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-7">
            <h2 class="featurette-heading">Agronote</h2>
            <p class="lead">Selecione com qual fornecedor que deseja realizar o pedido.</p>
        </div>
    </div>
    <form action="">
        <div class="row">
            <div class="col-md-7">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Fornecedores</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($fornecedor as $f)
                        <tr>
                            <td scope="row" name="fornecedor"> {{ $f->name }} </td>
                            <td>
                                <a href="{{ route('produtor.cotacao', ['id' => $f->id]) }}" type="button" class="btn btn-warning">Ver produtos</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-1 ml-1">
                <a href="{{ route('site.home') }}" type="button" class="btn btn-primary">
                    Voltar
                </a>
            </div>

        </div>
    </form>
</div>


@endsection