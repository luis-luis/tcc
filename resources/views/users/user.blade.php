@extends('layouts.app')

@section('content')

<div class="container">
    <div class="col-md-7">
        <h2 class="featurette-heading">Agronote</h2>
        <p class="lead" text->Usuários cadastrados</p>
    </div>
</div>

<form method="post" action="#">
    <div class="container py-3">
        @csrf
        <div class="mb-3">
            <label class="form-label">Usuário</label>
            <input type="text" class="form-control" id="name" name="name">
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
                            <th scope="col">Nome do usuário</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($user as $usuario)
                        <tr>
                            <td scope="row">{{ $usuario->name }}</td>
                            <td><a href="{{ route('users.edituser', $usuario->id) }}" type="button" class="btn btn-warning">Editar cadastro</a></td>
                            <td><a href="{{ route('users.destroyuser', $usuario->id) }}" type="button" class="btn btn-danger" onclick="javascript:return confirm('Você tem certeza que deseja inativar esse usuário?');">Excluir cadastro</a></td>
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