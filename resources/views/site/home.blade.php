@extends('layouts.app')

@section('content')

<!-- <div id="myCarousel" class="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
                <rect width="100%" height="100%" fill="#777" />
            </svg>

            <div class="container">
                <div class="carousel-caption">
                    <h1>Agronote</h1>
                    <p>
                        Com objetivo de auxiliar o agronomo no cálculo do veneno para utilizar na propriedade rural, o Agronote irá calcular todo o veneno para você.
                        Quer saber como? Clique em "Começar agora"!
                    </p>
                    <p><a class="btn btn-lg btn-primary" href="{{route('receita.index')}}">Começar agora </a></p>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
                <rect width="100%" height="100%" fill="#777" />
            </svg>
        </div>
    </div>
</div> -->
<div class="container">
    <div class="row featurette">
        <div class="col-md-7">
            <h2 class="featurette-heading">Agronote</h2>
            <p class="lead" text->Sua pulverização de maneira fácil e segura!</p>
        </div>
    </div>
</div>

<!-- Marketing messaging and featurettes
      ================================================== -->
<!-- Wrap the rest of the page in another container to center all the content. -->

<div class="container marketing">
    <!-- Three columns of text below the carousel -->
    <div class="row">
        <div class="col-lg-4">
            <img class="rounded-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" width="140" height="140">
            <h2>Gestão de Receitas</h2>
            <a href="{{route('receita.index')}}" type="submit" class="btn btn-success"><p>Cadastre novas receitas em um único local.</p></a>
            <!-- <a href="{{route('receita.index')}}">Acessar</a> -->
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
            <img class="rounded-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" width="140" height="140">
            <h2>Histórico</h2>
            <a href="{{route('site.history')}}" type="submit" class="btn btn-success"><p>Consulte receitas geradas anteriormente.</p></a>
            <p></p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-4">
            <img class="rounded-circle" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Generic placeholder image" width="140" height="140">
            <h2>Sobre Nós</h2>
            <a a href="{{route('site.history')}}" type="submit" class="btn btn-success"><p>Conheça um pouco mais a respeito do projeto</p></a>
            <p></p>
        </div><!-- /.col-lg-4 -->
    </div><!-- /.row -->
    <!-- /END THE FEATURETTES -->
</div><!-- /.container -->

<!-- FOOTER -->
<footer class="container">
    <p class="float-right"><a href="#">Voltar ao topo</a></p>
    <p contenteditable="true" spellcheckker="false">© 2022 Agronote</p>
</footer>


@endsection