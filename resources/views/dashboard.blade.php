@extends('layouts.AdmMain')

@section('titulo', 'Dashboard')

@section('conteudo')

<header class="bg-light text-center py-5 mt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="display-5">Bem-vindo à Loteria Online</h1>
                <p class="lead text-center">Aposte nos seus jogos favoritos sem sair de casa!</p>
                <img src="/img/loto2.png" width="200px" height="80px" alt="logo">
            </div>
        </div>
    </div>
</header>

<!--Apostas disponiveis -->
<section id="historico" class="py-5 bg-light">
    <div class="container">
        <h2 class="mb-4">Sorteios Ativos</h2>
        @if(session('status'))
        <div class="alert alert-danger">
            <p>{{session('status')}}</p>
        </div>
        @endif
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="table-primary">
                    <tr>
                        <th>#</th>
                        <th>Descrição</th>
                        <th>Data/Hora</th>
                        <th>Premio</th>
                        <th>Valor</th>
                        <th>Quantidade</th>
                        <th>%</th>
                        <th>Status</th>
                        <th class="text-center">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sorteio as $sorteios)
                    <tr>
                        <td>{{ $sorteios->id }}</td>
                        <td>{{ $sorteios->descricao }}</td>
                        <td>{{ $sorteios->datahora }}</td>
                        <td>{{ $sorteios->premio }}</td>
                        <td>{{ $sorteios->valor }}</td>
                        <td>{{ $sorteios->qt_bilhete }}</td>
                        <td>{{ $sorteios->porcentagem }}</td>
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
                        <td>
                            <!--<a href="{{ route('bilhete', $sorteios->id) }}" class="btn btn-success">Participar</a>-->
                            <form action="{{ route('bilhete') }}" method="get" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" id="id_sorteio" name="id_sorteio" value="{{ $sorteios->id }}">
                                <input type="hidden" name="qt_bilhete" value="{{ $sorteios->qt_bilhete }}">
                                @if (($sorteios->status === 'cancelado') || ($sorteios->status === 'sorteado'))
                                <button class="btn btn-danger disabled" type="submit">Participar</button>
                                @else
                                <button class="btn btn-success" type="submit">Participar</button>
                                @endif

                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>

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

@endsection