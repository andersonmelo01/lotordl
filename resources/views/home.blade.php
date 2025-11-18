<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Plataforma de Apostas Lotérica</title>
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

    <!-- Hero / Destaques -->
    <header class="bg-light text-center py-5 mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <img src="/img/loto2.png" alt="logo" height="80px" width="200px">
                    <h1 class="display-5">Bem-vindo à Loteria Online</h1>
                    <p class="lead">Aposte nos seus jogos favoritos sem sair de casa!</p>
                    <a href="{{ route('login') }}" class="btn btn-primary btn-lg mt-3">Fazer Aposta Agora</a>
                </div>
                <div class="col-md-4">
                    <h1 class="display-5">Bilhete</h1>
                    <p class="lead txt-justificar">
                        Somos uma plataforma online especializada em facilitar sua participação nos jogos de lotoRDL, com
                        total segurança, praticidade e transparência. Nosso objetivo é tornar sua experiência com as apostas mais simples e
                        acessível, sem que você precise sair de casa.
                    </p>
                    <p class="lead txt-justificar">
                        Acreditamos que jogar na lotoRDL deve ser uma experiência divertida, prática e segura. Por isso, investimos
                        constantemente em tecnologia e atendimento para oferecer um serviço confiável, transparente e de fácil uso.
                    </p>
                </div>
                <div class="col-md-4">
                    <h1 class="display-5">Quem Somos</h1>
                    <p class="lead txt-justificar">
                        Somos uma plataforma online especializada em facilitar sua participação nos jogos de lotoRDL, com
                        total segurança, praticidade e transparência. Nosso objetivo é tornar sua experiência com as apostas mais simples e
                        acessível, sem que você precise sair de casa.
                    </p>
                    <p class="lead txt-justificar">
                        Acreditamos que jogar na lotoRDL deve ser uma experiência divertida, prática e segura. Por isso, investimos
                        constantemente em tecnologia e atendimento para oferecer um serviço confiável, transparente e de fácil uso.
                    </p>
                </div>
            </div>
        </div>
    </header>

    <!-- Formulário de Apostas -->
    <!--<section id="apostas" class="py-5 bg-white">
        <div class="container">
            <h2 class="mb-4">Fazer Aposta</h2>
            <form>
                <div class="mb-3">
                    <label for="tipoJogo" class="form-label">Tipo de Jogo</label>
                    <select class="form-select" id="tipoJogo" required>
                        <option selected disabled>Selecione</option>
                        <option>Megasena</option>
                        <option>Lotofácil</option>
                        <option>Quina</option>
                        <option>Dupla Sena</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="numeros" class="form-label">Números Escolhidos</label>
                    <input type="text" class="form-control" id="numeros" placeholder="Ex: 05, 12, 23, 34, 41, 56">
                </div>
                <button type="submit" class="btn btn-success">Confirmar Aposta</button>
            </form>
        </div>
    </section>-->

    <!-- Histórico de Apostas -->
    <section id="historico" class="py-5 bg-light">
        <div class="container">
            <h2 class="">Bilhetes Ativos</h2>
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="table-primary">
                        <tr>
                            <th>#</th>
                            <th>Descrição</th>
                            <th>Data/Hora</th>
                            <th>Premio</th>
                            <th>Valor</th>
                            <th>%</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sorteio as $sorteios)
                        <tr>
                            <td>{{ $sorteios->id }}</td>
                            <td>{{ $sorteios->descricao }}</td>
                            <td>{{ $sorteios->datahora }}</td>
                            <td>{{ 'R$ ' . number_format($sorteios->premio, 2, ',', '.') }}</td>
                            <td>{{ 'R$ ' . number_format($sorteios->valor, 2, ',', '.') }}</td>
                            <td>{{ '% ' . number_format($sorteios->porcentagem, 0, ',', '.') }}</td>
                            <td>
                                @if ($sorteios->status === 'ativo')
                                <span class="badge bg-success text-dark">{{ $sorteios->status }}</span>
                                @endif
                                @if ($sorteios->status === 'sorteado')
                                <span class="badge bg-warning text-dark">{{ $sorteios->status }}</span>
                                @endif
                                @if ($sorteios->status === 'cancelado')
                                <span class="badge bg-danger text-dark">{{ $sorteios->status }}</span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <hr class="m-4">
                <!-- Histórico de vencedores, ultimos 5-->
                <h2>Ultimos 5 contemplados</h2>
                <table class="table table-bordered table-hover">
                    <thead class="table-primary">
                        <tr>
                            <th>Bilhete</th>
                            <th>Sorteio</th>
                            <th>Numeros</th>
                            <th>Data</th>
                            <th>Valor</th>
                            <th>Sorteado</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($premio as $premios)
                        <tr>
                            <td>{{$premios->id_bilhete}}</td>
                            <td>{{$premios->id_sorteio}}</td>
                            <td>{{$premios->numerobilhete}}</td>
                            <td>{{$premios->datahora}}</td>
                            <td>'R$ ' . number_format(10000, 2, ',', '.')</td>
                        </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <!-- Rodapé -->
    <footer class="bg-primary text-white text-center py-3">
        <div class="container">
            <p class="mb-1">&copy; 2025 LotoRDL Online. Todos os direitos reservados.</p>
            <a href="#" class="text-white text-decoration-underline">Termos de uso</a> |
            <a href="#" class="text-white text-decoration-underline">Política de privacidade</a>
        </div>
    </footer>

    <!-- Scripts Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

</body>

</html>