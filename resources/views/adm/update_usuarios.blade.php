@extends('layouts.AdmMain')

@section('titulo', 'Update Usuario')

@section('conteudo')

<div class="container p-5 border border-info">

    <div class="row">
        @if(session('mensagem'))
        <div class="alert alert-success">
            <p>{{session('mensagem')}}</p>
        </div>
        @endif
        @foreach ($errors->all() as $error)
        <li class="alert alert-danger">{{ $error }}</li>
        @endforeach
        <h1 class="text-center">Update Usuario</h1>

        <div class="col-md-12">
            <form class="row" action="{{ route('AtualizarTipoUsuario') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="col-md-6">
                    <h4>Id: <p class="text-danger">{{ Auth::user()->id }}</p>
                        Nome: <p class="text-danger">{{ Auth::user()->name }}</p>
                        Usuario: <p class="text-danger">{{ Auth::user()->email }}</p>
                    </h4>
                </div>
                <div class="row">
                    <!-- Cpf -->
                    <div class="col-md-4">
                        <label for="cpf" class="form-label">
                            <h4>Cpf:</h4>
                        </label>
                        <input type="text" class="form-control is-valid" value="{{ $usuario->cpf }}" id="cpf" name="cpf" placeholder="000.000.000-00" disabled>
                        <hr>
                    </div>
                    <!-- Nome -->
                    <div class="col-md-4">
                        <label for="nome" class="form-label">
                            <h4>Nome:</h4>
                        </label>
                        <input type="text" class="form-control is-valid" value="{{ $usuario->name }}" id="nome" name="nome" placeholder="Descrição" maxlength="100" disabled></input>
                        <hr>
                    </div>
                    <div class="col-md-4">
                        <label for="nascimento" class="form-label">
                            <h4>Data de Nascimento:</h4>
                        </label>
                        <input type="date" class="form-control is-valid" value="{{ $usuario->dtnascimento }}" id="dtnasciemnto" name="dtnascimento" placeholder="data" disabled></input>
                        <hr>
                    </div>
                    <!-- Email -->
                    <div class="col-md-4">
                        <label for="email" class="form-label">
                            <h4>Email:</h4>
                        </label>
                        <input type="text" class="form-control is-valid" value="{{ $usuario->email }}" id="email" name="email" placeholder="Email" maxlength="100" disabled>
                        <div class="valid-feedback">
                            Por favor, Informe uma descrição
                        </div>
                        <hr>
                    </div>
                    <!-- Telefone1 -->
                    <div class="col-md-4">
                        <label for="telefone" class="form-label">
                            <h4>Telefone1:</h4>
                        </label>
                        <input type="tel" class="form-control is-valid" value="{{ $usuario->telefone }}" name="telefone" placeholder="(XX) XXXXX-XXXX" disabled></input>
                        <hr>
                    </div>
                    <!-- Access_level -->
                    <div class="col-md-4">
                        <label for="level" class="form-label">
                            <h4>Nivel de Acesso:</h4>
                        </label>
                        <input type="text" class="form-control is-valid" value="{{ $usuario->access_level }}" name="access_level" maxlength="15" disabled></input>
                        <select class="form-select" name="level" aria-label="Default select example">
                            <option selected>Tipo de Acesso</option>
                            <option value="admin">admin</option>
                            <option value="user">user</option>
                        </select>
                        <div class="valid-feedback">
                            Alterar Tipo de Acesso!
                        </div>
                        <hr>
                    </div>
                    <div class="col-md-4">
                        <label for="endereco" class="form-label">
                            <h4>Endereço Completo:</h4>
                        </label>
                        <p>{{ $usuario->endereco }}</p>
                        <hr>
                        <input type="hidden" class="form-control is-valid" id="id" name="id" value="{{ $usuario->id }}">
                        <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Update/Salvar</button>
                    </div>
                </div>
            </form>
        </div>

    </div>

</div>

@endsection