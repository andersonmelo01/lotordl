@extends('layouts.AdmMain')

@section('titulo', 'Dashboard')

@section('conteudo')

<h1 class="text-center">Usuarios / Clientes</h1>

<div class="container">
    @if(session('mensage'))
    <div class="alert alert-danger text-center">
        <p>{{session('mensage')}}</p>
    </div>
    @endif
    @if(session('delete'))
    <div class="alert alert-danger text-center">
        <p>{{session('delete')}}</p>
    </div>
    @endif
    @if(session('error'))
    <div class="alert alert-danger text-center">
        <p>{{session('error')}}</p>
    </div>
    @endif
    <h4>
        <div class="col-md-6">
            Id: <p class="text-danger">000{{ Auth::user()->id }}</p>
            Nome: <p class="text-danger">{{ Auth::user()->name }}</p>
            Usuario: <p class="text-danger">{{ Auth::user()->email }}</p>
        </div>

        <form action="" method="get" enctype="multipart/form-data">
            @csrf
            <div class="col-md-4">
                <label for="cpf" class="form-label">cpf:</label>
                <input type="text" class="form-control is-valid" id="cpf" name="cpf" placeholder="000.000.000-00" maxlength="14" required></input>
                <div class="valid-feedback">
                    Por favor, Informe um Cpf Valido
                </div>
                <button class="btn btn-primary" type="submit">Consultar</button>
                <a class="btn btn-primary" href="{{ route('usuarios') }}">Todos</a>
                <hr>
            </div>
        </form>
    </h4>
</div>
<div class="p-5 border border-info">
    <div class="col-md-12">
        <div class="row" style="width: 100%; height: 400px; overflow-y: scroll;">
            <!-- Grid com relação de usuarios -->
            <table class="table table-primary table-striped">
                <thead>
                    <tr>
                        <th scope="col">Id:</th>
                        <th scope="col">Nome:</th>
                        <th scope="col">Email:</th>
                        <th scope="col">Telefone:</th>
                        <th scope="col">Nascimento:</th>
                        <th scope="col">Tipo de Acesso:</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @foreach ($usuario as $usuarios)
                    <tr>
                        <td>000{{ $usuarios->id }}</td>
                        <td>{{ $usuarios->name }}</td>
                        <td>{{ $usuarios->email }}</td>
                        <td>{{ $usuarios->telefone }}</td>
                        <td>{{ $usuarios->dtnascimento }}</td>
                        <td>{{ $usuarios->access_level }}</td>
                        <td><a href="{{ route('update_usuarios', $usuarios->id) }}" class="btn btn-warning">Update</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>

@endsection