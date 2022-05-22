@extends('site.master.layout')

@section('content')

<div class="container">

    <!-- START THE FEATURETTES -->

    <hr class="featurette-divider">

    <div class="row featurette">
        <div class="col-md-7">
            <h2 class="featurette-heading fw-normal lh-1">Sua receita já está pronta! <span class="text-muted"> Visualize os itens da sua receita: </span></h2>
        </div>
        <div class="container">
            <label><b>Cliente:</b></label> 
            <label>{{$dados->nome_cliente}}</label>
            <br>
            <label><b>Telefone:</b></label>
            <label>{{$dados->tel_cliente}}</label>
            <br>
            <label><b>Cultura:</b></label>
            <label>{{$dados->cult}}</label>
            <br>
            <label><b>Tamanho do tanque:</b></label>
            <label>{{$dados->tanque_veneno}}</label>
            <br>
            <label><b>Tamanho da Área a ser aplicada:</b></label>
            <label>{{$dados->area_app}} alq.</label>
            <br>
            <label><b>Veneno 1:</b></label>
            <label>{{$dados->nome_veneno}}, {{$dados->qtd_veneno}}</label>
            <br>
            <label><b>Veneno 2:</b></label>
            <label>{{$dados->nome_veneno2}}, {{$dados->qtd_veneno2}}</label>
            <br>
            <label><b>Veneno 3:</b></label>
            <label>{{$dados->nome_veneno3}}, {{$dados->qtd_veneno3}}</label>
            <br>
            <label><b>Veneno 4:</b></label>
            <label>{{$dados->nome_veneno4}}, {{$dados->qtd_veneno4}}</label>
            <br>
            <label><b>Veneno 5:</b></label>
            <label>{{$dados->nome_veneno5}}, {{$dados->qtd_veneno5}}</label>
        </div>
    </div>
    <br>
    <br>

    <!-- botão para voltar ao início -->
    <div class="row">
        <div>
            <a href="{{route('site.home')}}" type="button" class="btn btn-outline-primary col-1 ml-1">
                Voltar ao inicio
            </a>
        </div>
        <div>
            <button href="#" type="button" class="btn btn-primary col-1 ml-1">
                Imprimir em .PDF
            </button>
        </div>
        <div>
            <button href="#" type="button" class="btn btn-success col-1 ml-1">
                Enviar via WhatsApp
            </button>
        </div>
    </div>
</div>
<hr class="featurette-divider">
<!-- /END THE FEATURETTES -->
</div><!-- /.container -->


@endsection