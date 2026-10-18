@extends('Layout.cadastros')

@section('title', 'Cadastro de Usuário')

@section('content')
    <header class="estoque-navbar">
        <h1 class="estoque-navbar-title">
            <span>Cadastro</span> de Usuário
        </h1>
    </header>

    <main class="container-fluid py-4 py-md-5">
        <div class="row justify-content-center">
            <section class="col-12 col-md-8 col-lg-6 col-xl-6" aria-label="Formulário de cadastro de usuário">
                <div class="card border-0 rounded-3 shadow-lg p-3 p-md-4">
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-12 col-md-6">
                                <label for="nome-usuario" class="form-label small fw-semibold">Nome de usuário</label>
                                <input id="nome-usuario" class="form-control" type="text"
                                    placeholder="Insira seu nome de usuário" autocomplete="username">
                            </div>

                            <div class="col-12 col-md-6">
                                <label for="email-usuario" class="form-label small fw-semibold">E-mail</label>
                                <input id="email-usuario" class="form-control" type="email"
                                    placeholder="Insira seu e-mail" autocomplete="email">
                            </div>

                            <div class="col-12 col-sm-8 col-md-6 mx-auto">
                                <label for="nif-usuario" class="form-label small fw-semibold">NIF</label>
                                <input id="nif-usuario" class="form-control" type="text" inputmode="numeric"
                                    placeholder="Insira o NIF do funcionário">
                            </div>

                            <div class="col-12 col-sm-8 col-md-6 mx-auto">
                                <label for="cpf-usuario" class="form-label small fw-semibold">CPF</label>
                                <input id="cpf-usuario" class="form-control" type="text" inputmode="numeric"
                                    placeholder="Insira o seu CPF" autocomplete="off">
                            </div>

                            <div class="col-12 col-sm-8 col-md-6 mx-auto">
                                <label for="senha-usuario" class="form-label small fw-semibold">Senha</label>
                                <input id="senha-usuario" class="form-control" type="password"
                                    placeholder="Digite sua senha" autocomplete="new-password">
                            </div>

                            <div class="col-12 col-sm-8 col-md-6 mx-auto">
                                <label for="confirmar-senha-usuario" class="form-label small fw-semibold">Confirme sua senha</label>
                                <input id="confirmar-senha-usuario" class="form-control" type="password"
                                    placeholder="Confirme sua senha" autocomplete="new-password">
                            </div>

                            <div class="col-12 col-sm-10 col-md-8 mx-auto">
                                <label for="cargo-usuario" class="form-label small fw-semibold">Cargo</label>
                                <select id="cargo-usuario" class="form-select">
                                    <option value="" selected>Escolha o cargo</option>
                                </select>
                            </div>

                            <div class="col-12 col-sm-10 col-md-8 mx-auto pt-2">
                                <button class="btn btn-danger w-100 fw-semibold py-3" type="button"
                                    style="background-color: #E40520; border-color: #E40520;">
                                    Cadastrar funcionário <i class="bi bi-arrow-right ms-1" aria-hidden="true"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>
@endsection
