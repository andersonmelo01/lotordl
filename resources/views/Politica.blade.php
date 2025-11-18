@extends('layouts.Main')

@section('titulo', 'Politica de Privacidade')

@section('conteudo')

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
          
        </div>
    </div>
</header>

@endsection