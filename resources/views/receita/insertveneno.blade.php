@extends('layouts.app')

@section('content')

<div class="container">
    <div class="col-md-7">
        <h2 class="featurette-heading">Agronote</h2>
        <p class="lead">Preencha abaixo os dados da sua nova receita!</p>
    </div>
</div>

<form method="post" action="{{route('receita.insertveneno')}}">
    @csrf

    <div class="container py-3">
        <div id="camposVeneno">
            <div class="mb-3">
                <label for="agrotoxico">Veneno a ser utilizado:</label>
                <select name="agrotoxicos[][idagrotoxico]" class="form-control">
                    <option value="" selected disabled>Selecione o veneno</option>
                    @foreach ($agrotoxicos as $agrotoxico)
                    <option value="{{ $agrotoxico->idagrotoxico }}">{{ $agrotoxico->nome_agrotoxico }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-5 mb-3">
                <label class="form-label">Quantidade de veneno (em litros)</label>
                <input type="number" class="form-control" id="quantidade" name="quantidade[]">
            </div>
        </div>

        <div class="row">
            <button type="submit" class="btn btn-success col-1 ml-1">Salvar</button>
            <a href="{{ route('receita.insert') }}" type="button" class="btn btn-primary col-1 ml-1">
                Voltar
            </a>
            <button id="btnAdicionarVeneno" type="button" class="btn btn-danger col-1 ml-1">Adicionar veneno</button>
        </div>

        <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Obtém o botão "Adicionar Veneno"
            var btnAdicionarVeneno = document.getElementById('btnAdicionarVeneno');

            // Adiciona um ouvinte de evento de clique ao botão
            btnAdicionarVeneno.addEventListener('click', function() {
                // Obtém o elemento pai dos campos de veneno
                var container = document.getElementById('camposVeneno');

                // Cria os elementos dos campos de veneno
                var divVeneno = document.createElement('div');
                var selectVeneno = document.createElement('select');
                var inputQuantidade = document.createElement('input');

                // Define os atributos dos elementos
                selectVeneno.name = 'agrotoxicos[]';
                selectVeneno.className = 'form-control';
                inputQuantidade.type = 'number';
                inputQuantidade.name = 'quantidades[]';
                inputQuantidade.className = 'form-control';

                // Cria a opção padrão
                var option = document.createElement('option');
                option.value = '';
                option.disabled = true;
                option.selected = true;
                option.textContent = 'Selecione o veneno';
                selectVeneno.appendChild(option);

                // Adiciona os elementos ao elemento pai
                divVeneno.appendChild(selectVeneno);
                divVeneno.appendChild(inputQuantidade);
                container.appendChild(divVeneno);
            });
        });
    </script>
</form>

@endsection