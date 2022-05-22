@extends('site.master.layout')

@section('content')

<?php

use Illuminate\Support\Facades\DB;

$nomecliente = $_POST['cliente'];
$telcliente = $_POST['phone'];
$v1 = $_POST['veneno1'];
$v2 = $_POST['veneno2'];
$v3 = $_POST['veneno3'];
$v4 = $_POST['veneno4'];
$v5 = $_POST['veneno5'];
$qtdv1 = $_POST['qtdv1'];
$qtdv2 = $_POST['qtdv2'];
$qtdv3 = $_POST['qtdv3'];
$qtdv4 = $_POST['qtdv4'];
$qtdv5 = $_POST['qtdv5'];
$cult = $_POST['cult'];
$pulv = $_POST['pulv'];
$area = $_POST['area_app'];
//$calculo = 


$insert = 'insert into receitas (nome_cliente, tel_cliente, nome_veneno, nome_veneno2, nome_veneno3, nome_veneno4, nome_veneno5, 
 qtd_veneno, qtd_veneno2, qtd_veneno3, qtd_veneno4, qtd_veneno5, tanque_veneno, cult, area_app) values(' .
    $nomecliente . ',' . $telcliente . ',' . $v1 . ',' . $v2 . ',' . $v3 . ',' . $v4 . ',' . $v5 . ',' . $qtdv1 . ',' . $qtdv2 . ',' . $qtdv3 . ',' . $qtdv4 . ',' . $qtdv5 . ',' . $pulv . ',' . $cult . ',' . $area . ')';

echo $insert;

//echo $v1." ".$v2." ".$v3." ".$v4." ".$v5;

/*
DB::insert(
    'insert into receitas (nome_cliente, tel_cliente, nome_veneno, nome_veneno2, nome_veneno3, nome_veneno4, nome_veneno5, 
qtd_veneno, qtd_veneno2, qtd_veneno3, qtd_veneno4, qtd_veneno5, tanque_veneno, cult, area_app) values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)',
    [$nomecliente, $telcliente, $v1, $v2, $v3, $v4, $v5, $qtdv1, $qtdv2, $qtdv3, $qtdv4, $qtdv5, $pulv, $cult, $area]
);
*/
?>

<div class="container">

    <!-- START THE FEATURETTES -->

    <hr class="featurette-divider">

    <div class="row featurette">
        <div class="col-md-7">
            <h2 class="featurette-heading fw-normal lh-1">Sua receita já está pronta! <span class="text-muted"> Visualize os itens da sua receita: </span></h2>
        </div>
        <div class="container">
            <label>Cliente</label>
            <label>{{$nomecliente}}</label>
            <br>
            <label>Telefone</label>
            <label>{{$telcliente}}</label>
            <br>
            <label>Cultura</label>
            <label>{{$cult}}</label>
            <br>
            <label>Tamanho do tanque</label>
            <label>{{$pulv}}</label>
            <br>
            <label>Tamanho da Área a ser aplicada</label>
            <label>{{$area}} alq.</label>
            <br>
            <label>Veneno 1</label>
            <label>{{$v1}}, {{$qtdv1}}</label>
            <br>
            <label>Veneno 2</label>
            <label>{{$v2}}, {{$qtdv2}}</label>
            <br>
            <label>Veneno 3</label>
            <label>{{$v3}}, {{$qtdv3}}</label>
            <br>
            <label>Veneno 4</label>
            <label>{{$v4}}, {{$qtdv4}}</label>
            <br>
            <label>Veneno 5</label>
            <label>{{$v5}}, {{$qtdv5}}</label>
        </div>
    </div>
    <br>
    <br>

    <!-- botão para voltar ao início -->
    <div class="row">
        <div>
            <a href="/tcc/tcc/public/" type="button" class="btn btn-outline-primary col-1 ml-1">
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


<!-- <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false">
        <title>Receita</title>
        <rect width="100%" height="100%" fill="#eee"></rect>
        <g id="content" transform="translate(201, 151)">
        <text text-anchor="middle" id="header" font-family="Varela Rounded, sans-serif" fill="#334152">
        <tspan x="50" y="-80" font-weight="bold" font-size="44">Receita</tspan>
        <tspan x="-10" y="-15" opacity="0.8" font-size="36">
            Cliente = {{$nomecliente}}
        </tspan>
    </text>
    </g>
</svg> -->