<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Agronote</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('/') }}">
                    Agronote
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    @if(Auth::check())
                    @if(Auth::user()->leveluser == 1)
                    <ul class="navbar-nav me-auto">
                        @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('produtor.history')}}">Histórico de despesas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('produtor.index')}}">Gerar nova despesa</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('receita.history')}}">Histórico de pulverizações</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('produtor.cotacao')}}">Solicitar cotação</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('produtor.mostrarcotacao')}}">Consultar cotações</a>
                        </li>
                        @endauth
                    </ul>
                    @endif

                    @if(Auth::user()->leveluser == 2)
                    <ul class="navbar-nav me-auto">
                        @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('receita.history')}}">Histórico de pulverizações</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('receita.insert')}}">Gerar nova pulverização</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('pessoa.insertpessoa')}}">Cadastrar novo cliente</a>
                        </li>
                        @endauth
                    </ul>
                    @endif

                    @if(Auth::user()->leveluser == 3)
                    <ul class="navbar-nav me-auto">
                        @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('lojista.index')}}">Cadastro de produtos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('lojista.history')}}">Consultar produtos cadastrados</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="">Verificar solicitações de produtos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('lojista.history')}}">Histórico de vendas</a>
                        </li>
                        @endauth
                    </ul>
                    @endif

                    @endif

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                        @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @endif

                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('registro') }}">{{ __('Registro') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    Sair
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>

        <!-- FOOTER
        <footer class="container">
            <p class="float-end"><a href="#">Back to top</a></p>
            <p>&copy; 2017–2022 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
        </footer> -->

        @yield('javascript')
        <script>
            const tel = document.getElementById('phone') // Seletor do campo de telefone

            tel.addEventListener('keypress', (e) => mascaraTelefone(e.target.value)) // Dispara quando digitado no campo
            tel.addEventListener('change', (e) => mascaraTelefone(e.target.value)) // Dispara quando autocompletado o campo

            const mascaraTelefone = (valor) => {
                valor = valor.replace(/\D/g, "")
                valor = valor.replace(/^(\d{2})(\d)/g, "($1) $2")
                valor = valor.replace(/(\d)(\d{4})$/, "$1-$2")
                tel.value = valor // Insere o(s) valor(es) no campo
            }
        </script>
    </div>
</body>

</html>