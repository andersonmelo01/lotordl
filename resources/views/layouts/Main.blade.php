<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('titulo')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">>

    <style>
        .txt-justificar {
            text-align: justify;
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
        <div class="container">
            <a class="navbar-brand" href="/">LotoRDL</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    @if (Route::has('login'))
                    @auth
                    <div class="">
                        <div class="">
                            <p class="p-0 m-0 text-warning">Usuario: {{ Auth::user()->name }}</p>
                            <p class="p-0 m-0 text-warning">Saldo: R${{ Auth::user()->saldo }}</p>
                            <li class="nav-item"><a class="nav-link" href="{{ url('/dashboard') }}">Fazer Aposta</a></li>
                        </div>
                    </div>

                    @else
                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>

                    @if (Route::has('register'))
                    <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Cadastro</a></li>
                    @endif
                    @endauth
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    @yield('conteudo')
    <!-- Rodapé -->
    <footer class="bg-primary text-white text-center py-3">
        <div class="container">
            <p class="mb-1">&copy; 2025 LotoRDL Online. Todos os direitos reservados.</p>
            <a href="/TermoUso" class="text-white text-decoration-underline">Termos de uso</a> |
            <a href="/Politica" class="text-white text-decoration-underline">Política de privacidade</a>
        </div>
    </footer>

    <!-- Scripts Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

</body>

</html>