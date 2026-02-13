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
                <h1 class="display-5"><strong>O que você precisa saber:</strong></h1>
                <p class="lead txt-justificar">
                    Nossa prioridade é garantir um ambiente seguro e legal. Por isso, exigimos:
                </p>
                <p class="lead txt-justificar">
                    <strong>Idade Legal:</strong> você <strong>deve ter 18 (dezoito) anos ou mais </strong>
                    para criar uma conta e realizar apostas, conforme a legislação brasileira (Lei nº 14.790/2023). A verificação de idade é obrigatória.
                <p class="lead txt-justificar">
                    <strong>Dados Veridicos (KYC ): </strong>Você concorda em fornecer informações cadastrais completas, precisas e
                    atualizadas, incluindo seu nome completo e CPF regular. Realizamos verificações de identidade (Know Your Customer – KYC)
                    para prevenir fraudes e lavagem de dinheiro, podendo solicitar documentos comprobatórios a qualquer momento.
                </p>
                <p class="lead txt-justificar">
                    <strong>Conta Única e Pessoal: </strong>É permitido apenas um cadastro por pessoa (CPF). Sua conta é intransferível e de uso
                    exclusivo seu; o compartilhamento de acesso é estritamente proibido.
                </p>
                <h1 class="display-5"><strong>Transções Financeiras e Premiações</strong></h1>
                <p class="lead txt-justificar">
                    <strong>Titularidade: </strong>Todos os depósitos e saques devem ser realizados a partir de contas bancárias ou carteiras digitais
                    (ex: PIX) que tenham a mesma titularidade do CPF cadastrado em nossa Plataforma. Esta é uma medida de segurança obrigatória.
                </p>
                <p class="lead txt-justificar">
                    <strong>Pagamento de Premios: </strong>Os valores dos prêmios serão creditados em sua conta na Plataforma após a validação do resultado oficial.
                    Você poderá solicitar o saque dentro dos prazos e limites estabelecidos em nossa seção de "Pagamentos".
                </p>
                <h1 class="display-5"><strong>Privacidade e Proteção de Dados (LGPD)</strong></h1>
                <p class="lead txt-justificar">
                    <strong>Seus Dados Conosco: </strong>Coletamos e tratamos seus dados pessoais em conformidade com a Lei Geral de Proteção de Dados (LGPD).
                    A finalidade é operar o serviço, prevenir fraudes e cumprir obrigações legais.
                </p>
                <p class="lead txt-justificar">
                    <strong>Politica de Privacidade: </strong>Para detalhes completos sobre como usamos, armazenamos e protegemos suas informações,
                    consulte nossa [Link para a Política de Privacidade]
                </p>
            </div>

        </div>
    </div>
</header>

@endsection