@extends('layouts.AdmMain')

@section('titulo', 'Bilhete')

@section('conteudo')

<section id="historico" class="py-5 bg-light">
    <div class="container">
        <h2 class="mb-4">Escolha o seu bilhete</h2>
        <div class="table-responsive">
            <div class="row justify-content-md-center">
                <div class="col-md-4 text-center">
                    @if (!empty($SorteioBilhete))<!-- verifica se a varialvel não é nula ou vazia-->
                    @foreach ($bilhete as $bilhetes)
                    <form action="{{ route('SortearBilhete') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" id="id_sorteio" name="id_sorteio" value="{{ $bilhetes->id_sorteio }}">
                        @endforeach
                        <!--Somente administrador-->
                        @can('access')
                        @if ($Porcentagem >= preg_replace("/[^0-9.]/", "", $PorcentagemOrigem))
                        <button class="btn btn-warning btn-lg" type="submit">Sortear</button>
                        @else
                        <button class="btn btn-warning btn-lg disabled" type="submit">Sortear</button>
                        @endif
                        @endcan
                        <!--Somente administrador-->
                        <hr>
                        <p>Porcentagem Origem: <strong>{{ preg_replace("/[^0-9.]/", "", $PorcentagemOrigem) }} %</strong></p>
                        <p>Porcentagem Atual: <strong>{{ $Porcentagem }} %</strong></p>
                        <p>Porcentagem Para Realização do Sorteio tem que ser maior ou igual <strong>Porcentagem Origem</strong></p>
                    </form>
                    <hr>
                    @else
                    <h3>Sorteio não habilitado</h3>
                    <hr>
                    @endif
                    @foreach ($bilhete as $bilhetes)
                    @if ($bilhetes->status === 'sorteado')
                    <p>{{ $bilhetes->id_sorteio }}</p>
                    <p>{{ $bilhetes->id }}</p>
                    <p>{{ $bilhetes->numero }}</p>
                    <p>{{ $bilhetes->status }}</p>
                    @endif
                    @endforeach
                </div>
            </div>

            <!-- mensagem -->
            @if(session('mensagem'))
            <div class="alert alert-success">
                <p>{{session('mensagem')}}</p>
            </div>
            @endif
            @if(session('indisponivel'))
            <div class="alert alert-danger">
                <p>{{session('indisponivel')}}</p>
            </div>
            @endif
            <!-- mensagem -->
            <table class="table table-bordered table-hover">
                <thead class="table-primary">
                    <tr>
                        <th>Sorteiro</th>
                        <th>Bilhete</th>
                        <th>Tipo de Jogo</th>
                        <th>Números</th>
                        <th>Status</th>
                        <th>Valor</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bilhete as $bilhetes)
                    <tr>
                        @if ($bilhetes->status === 'ativo')
                        <td>{{ $bilhetes->id_sorteio }}</td>
                        <td>{{ $bilhetes->id }}</td>
                        <td>{{ $bilhetes->descricao }}</td>
                        <td>{{ $bilhetes->numero }}</td>
                        <td>{{ $bilhetes->status }}</td>
                        <td>{{ $bilhetes->valor }}</td>
                        <td>
                            <form action="{{ route('apostar') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @if ($bilhetes->id_user != '')
                                <button class="btn btn-success disabled" type="submit">Apostar</button>
                                @else
                                <input type="hidden" name="id" value="{{ $bilhetes->id }}">
                                <input type="hidden" name="id_user" value="{{ Auth::user()->id }}">
                                <input type="hidden" name="saldo" value="{{ Auth::user()->saldo }}">
                                <input type="hidden" name="valor" value="{{ $bilhetes->valor }}">
                                <input type="hidden" name="status" value="{{ $bilhetes->status }}">
                                <input type="hidden" name="id_sorteio" value="{{ $bilhetes->id_sorteio }}">
                                @if (Auth::user()->saldo < $bilhetes->valor)
                                    <p class="text-danger">Saldo insuficiente, colocar crédito</p>
                                    @else
                                    <button class="btn btn-success" type="submit">Apostar</button>
                                    @endif
                                    @endif
                            </form>
                        </td>
                        @else
                        <td>{{ $bilhetes->id_sorteio }}</td>
                        <td>{{ $bilhetes->id }}</td>
                        <td>{{ $bilhetes->descricao }}</td>
                        <td>{{ $bilhetes->numero }}</td>
                        <td>{{ $bilhetes->status }}</td>
                        <td>{{ $bilhetes->valor }}</td>
                        <td><a href="" class="btn btn-danger disabled">Indisponivel</a></td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>

@endsection