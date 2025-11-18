@extends('layouts.Main')

@section('titulo', 'Home')

@section('conteudo')
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
            <div class="col-md-8">
                <h1 class="display-5">Quem Somos</h1>
                <p class="lead txt-justificar">
                    Somos uma plataforma online especializada em facilitar sua participação nos jogos da lotoRDL, com
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
@endsection