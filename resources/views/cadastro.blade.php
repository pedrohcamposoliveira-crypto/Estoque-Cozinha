@extends('Layout.principal')

@section('title', 'cadastro')

@section('content')
    <div class="row">
        <div class = "col-6" style="background-image: url('Imagem_login.png'); background-size: cover; height: 98vh;">
            <div style="color: white;text-align: center; margin-top: 40vh;">
                <h1>
                    Sistema de Gerenciamento de<br>
                    Estoque da Cozinha Escolar
                </h1>

                <p>
                    Mais Controle e Eficiência, Menos Desperdício, Uma melhor<br>
                    alimentação para a escola SESI.
                </p>
            </div>
        </div>
        <div class = "col-6">
            <img src="sesi_logo.png" alt="..." style="width: 250px; height: 250px; margin-top: -50px;">
            <div class="row justify-content-center d-flex fonte">
                <h1 style="font-size: 75px; margin-top:-50px; color:#E40520;" class="text-center text-danger text-align"><b>
                        Bem-vindo(a)!</b></h1>
                <div class="row justify-content- d-flex">
                    <div class="col"> </div>
                </div>

            </div>
            <p class="text-center mt-0 text-align">Faça login para acessar o sistema.</p>
            <div class="col-lg-8 col-md-6 col-sm-12 mt-3 mx-auto">
                <label for="cpf" class="form-label fonte">E-mail</label>
                <input type="text" class="form-control form-control-sm" maxlength="100" id="email" name="email"
                    placeholder="Digite seu e-mail" style="border-color: #080808;">
            </div>
            <div class="col-lg-8 col-md-6 col-sm-12 mt-5 mx-auto">
                <label for="senha" class="form-label fonte">Senha</label>
                <input type="password" class="form-control form-control-sm" id="senha" name="senha"
                    placeholder="Digite sua senha" style="border-color: #080808;">

            </div>
            <div class="mx-auto mt-5" style="width: 400px;">
                <a href="{{ route('tela_estoque') }}" class="btn btn-lg"
                    style="background-color: #E40520; color: white; width: 100%;">
                    Entrar →
                </a>
            </div>
        @endsection
