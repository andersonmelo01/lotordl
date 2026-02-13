<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('titulo')</title>

    <!-- Fonts -->
    <link href=" https://fonts.cdnfonts.com/css/mount-personal-use-only " rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <style>
        * {
            font-family: 'Mount PERSONAL USE ONLY', sans-serif;
        }

        #titulo {
            font-size: 40px;
        }

        p {
            text-align: justify;
        }

        #rope {
            background-color: rgb(248, 185, 219);
            padding: 5px;

            bottom: 0;
            left: 0;
            height: auto;
            width: 100%;
            margin: 0;
        }
    </style>
    <script>
        function formatarCnpj(mascara, documento) {
            let i = documento.value.length;
            let saida = '#';
            let texto = mascara.substring(i);
            while (texto.substring(0, 1) != saida && texto.length) {
                documento.value += texto.substring(0, 1);
                i++;
                texto = mascara.substring(i);
            }
        }

        function formatarTel(mascara, documento) {
            let i = documento.value.length;
            let saida = '#';
            let texto = mascara.substring(i);
            while (texto.substring(0, 1) != saida && texto.length) {
                documento.value += texto.substring(0, 1);
                i++;
                texto = mascara.substring(i);
            }
        }

        function imprimir() {
            window.print();
        }
    </script>
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <header>

        <nav class="navbar navbar-dark bg-dark">
            <div class="container-fluid">
                <button class="btn bg-dark"><a href="{{ route('dashboard') }}" class="navbar-brand">Painel Administrativo</a></button>
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
                    <div class="container">
                        <div class="bg-dark">
                            <p class="p-0 m-0">{{ Auth::user()->id }}</p>
                            <p class="p-0 m-0">{{ Auth::user()->name }}</p>
                            <p class="p-0 m-0">{{ Auth::user()->email }}</p>
                            <p class="p-0 m-0 text-warning">Saldo: {{ 'R$ ' . number_format(Auth::user()->saldo, 2, ',', '.') }}</p>
                            <a href="/adm/depositar" class="btn btn-warning btn-sm">Depositar</a>
                            <a href="" class="btn btn-danger btn-sm">Sacar</a>
                        </div>
                    </div>
                    <div class="offcanvas-header">
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="{{ route('dashboard') }}" role="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="true">
                                    Área do Administrador
                                </a>
                                <ul class="dropdown-menu" id="meuDropdown">
                                    <li>
                                        <button class="btn" type="submit"><a class="dropdown-item enablad" href="{{ route('dashboard') }}">Dashboard</a></button>
                                    </li>
                                    @can('access')
                                    <li>
                                        <button class="btn" type="submit"><a class="dropdown-item enablad" href="{{ route('usuarios') }}">Usuarios</a></button>
                                    </li>
                                    <li>
                                        <button class="btn" type="submit"><a class="dropdown-item enablad" href="{{ route('sorteio') }}">Sorteio</a></button>
                                    </li>
                                    @endcan
                                    <hr>
                                    <li>
                                        <button class="btn"><a class="dropdown-item enablad" href="/profile">Profile</a></button>
                                    </li>
                                    <li>
                                        <button class="btn"><a href="/" class="dropdown-item enablad">Sair</a></button>
                                    </li>
                                    <li>
                                        <form action="{{ route('logout') }}" method="post">
                                            @csrf
                                            <button class="btn"><a class="dropdown-item enablad" href="route('logout')" onclick="event.preventDefault();this.closest('form').submit();">Fazer Logof</a></button>
                                        </form>
                                    </li>
                                </ul>
                    </div>

                </div>
        </nav>
    </header>


    @if (Route::has('login'))
    <div class="h-14.5 hidden lg:block"></div>
    @endif
    @yield('conteudo')
    <footer class="bg-dark text-white text-center py-3">
        <div class="container text">
            <p class="mb-1 text-center">&copy; 2025 LotoRDL Online. Todos os direitos reservados.</p>
            <a href="#" class="text-white text-decoration-underline">Termos de uso</a> |
            <a href="#" class="text-white text-decoration-underline">Política de privacidade</a>
        </div>
    </footer>
    <!--<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

</body>

</html>