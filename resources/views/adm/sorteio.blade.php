@extends('layouts.AdmMain')

@section('titulo', 'Sorteios')

@section('conteudo')

<div class="container p-5 border border-info">
    @if(session('mensagem'))
    <div class="alert alert-success">
        <p>{{session('mensagem')}}</p>
    </div>
    @endif
    <h1>Cadastro de Sorteios</h1>
    <form class="row" action="{{ route('CasdastroSorteio') }}" method="post" enctype="multipart/form-data">
        @csrf
        <!-- Descrição -->
        <div class="col-md-4">
            <label for="Descricao" class="form-label">
                <h4>Descrição:</h4>
            </label>
            <input type="text" class="form-control is-valid" id="descricao" name="descricao" placeholder="Descrição do Bilhete" maxlength="50" required></input>
            <hr>
        </div>
        <!-- Data hora -->
        <div class="col-md-4">
            <label for="DataHora" class="form-label">
                <h4>Data/Hora:</h4>
            </label>
            <input type="datetime-local" class="form-control is-valid" id="datahora" name="datahora" placeholder="Data / Hora" maxlength="50" required></input>
            <hr>
        </div>
        <!-- Premio -->
        <div class="col-md-4">
            <label for="Premio`" class="form-label">
                <h4>Premio:</h4>
            </label>
            <input type="text" class="form-control is-valid" id="premio" name="premio" placeholder="R$ 0,00" pattern="[0-9]*([,.][0-9]{1,2})?" maxlength="15" required></input>
            <hr>
        </div>
        <!-- Valor -->
        <div class="col-md-4">
            <label for="Valor`" class="form-label">
                <h4>Valor:</h4>
            </label>
            <input type="text" class="form-control is-valid" id="valor" name="valor" placeholder="R$ 0,00" pattern="[0-9]*([,.][0-9]{1,2})?" maxlength="15" required></input>
            <hr>
        </div>
        <!-- Status -->
        <div class="col-md-4">
            <label for="Status" class="form-label">
                <h4>Status:</h4>
            </label>
            <!--<input type="text" class="form-control is-valid" value="" name="status" maxlength="15" disabled></input>-->
            <select class="form-select" name="status" aria-label="Default select example">
                <option selected></option>
                <option value="ativo">ativo</option>
                <option value="premiado">premiado</option>
                <option value="derrotado">derrotado</option>
                <option value="cancelado">cancelado</option>
            </select>
            <hr>
        </div>
        <!-- Porcentagem -->
        <div class="col-md-4">
            <label for="Porcentagem" class="form-label">
                <h4>Porcentagem:</h4>
            </label>
            <input type="number" class="form-control is-valid" id="porcentagem" name="porcentagem" placeholder="%" maxlength="50" required></input>
            <hr>
        </div>
        <!-- Quantidade -->
        <div class="col-md-4">
            <label for="Quantidade" class="form-label">
                <h4>Quantidade de Bilhete:</h4>
            </label>
            <input type="number" class="form-control is-valid" id="quantidade" name="quantidade" placeholder="valor numérico" required></input>
            <hr>
        </div>
        <div class="row justify-content-md-center">
            <!-- Botoes -->
            <div class="col-md-4 text-center">
                <button class="btn btn-success" type="submit">Salvar/Gravar</button>
            </div>
        </div>
    </form>
    <h2 class="mb-4">Sorteios Ativos</h2>
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
                    <th></th>
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
                            <input type="hidden" name="id_sorteio" value="{{ $sorteios->id }}">
                            <input type="hidden" name="qt_bilhete" value="{{ $sorteios->qt_bilhete }}">
                            @if (($sorteios->status === 'cancelado') || ($sorteios->status === 'sorteado'))
                            <button class="btn btn-danger disabled" type="submit">Participar</button>
                            @else
                            <button class="btn btn-success" type="submit">Participar</button>
                            @endif

                        </form>
                    </td>
                    <td class="text-center">
                        <form action="{{ route('GerarBilhete') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id_sorteio" value="{{ $sorteios->id }}">
                            <input type="hidden" name="qt_bilhete" value="{{ $sorteios->qt_bilhete }}">
                            <input type="hidden" name="descricao" value="{{ $sorteios->descricao }}">
                            <input type="hidden" name="valor" value="{{ $sorteios->valor }}">
                            <input type="hidden" name="id_user" value="{{ Auth::user()->id }}">
                            @if (($sorteios->status === 'cancelado') || ($sorteios->status === 'sorteado'))
                            <button class="btn btn-warning disabled" type="submit">Gerar Bilhetes</button>
                            @else
                            <button class="btn btn-warning" type="submit">Gerar Bilhetes</button>
                            @endif
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
@endsection