@extends('site.master.layout')

@section('content')

<div id="myCarousel" class="carousel">
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
                    <p><a class="btn btn-lg btn-primary" href="{{route('site.recipe')}}">Começar agora </a></p>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
                <rect width="100%" height="100%" fill="#777" />
            </svg>
        </div>
    </div>
</div>
@endsection