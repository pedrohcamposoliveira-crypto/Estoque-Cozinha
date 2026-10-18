@extends('Layout.cadastros')

@section('title', 'Cadastro de Produto')

@section('content')
    <header class="estoque-navbar">
        <button class="sidebar-open-button" type="button" aria-label="Abrir menu" aria-controls="estoque-sidebar"
            aria-expanded="false" data-sidebar-open>
            <span></span>
            <span></span>
            <span></span>
        </button>
        <h1 class="estoque-navbar-title">
            <span>Cadastro</span> de Produto
        </h1>
    </header>

    <div class="sidebar-backdrop" data-sidebar-close></div>
    <aside class="estoque-sidebar" id="estoque-sidebar" aria-label="Menu principal" aria-hidden="true">
        <div class="estoque-sidebar-heading">
            <span class="estoque-sidebar-brand fonte fs-1 text-danger">SESI</span>
            <button class="sidebar-close-button" type="button" aria-label="Fechar menu" data-sidebar-close>×</button>
        </div>
        <nav class="estoque-sidebar-nav">
            <a class="estoque-sidebar-link" href="{{ route('tela_estoque') }}">Estoque</a>
            <a class="estoque-sidebar-link" href="{{ route('tela_produto') }}">Cadastro de Produtos</a>
            <a class="estoque-sidebar-link" href="{{ route('tela_fornecedor') }}">Cadastro de Fornecedores</a>
            <a class="estoque-sidebar-link" href="{{ route('tela_historico_movimentacao') }}">Histórico de Movimentações</a>
            <a class="estoque-sidebar-link" href="{{ route('tela_retirada_produto') }}">Retirada de Produtos</a>
            <a class="estoque-sidebar-link" href="{{ route('tela_gestao_usuario') }}">Gerenciamento de Usuários</a>
            <a class="estoque-sidebar-link" href="{{ route('tela_meu_usuario') }}">Meu Usuário</a>
        </nav>
    </aside>

    <script>
        (() => {
            const sidebar = document.getElementById('estoque-sidebar');
            const openButton = document.querySelector('[data-sidebar-open]');
            const closeButtons = document.querySelectorAll('[data-sidebar-close]');
            const setSidebarOpen = (isOpen) => {
                document.body.classList.toggle('sidebar-is-open', isOpen);
                sidebar.setAttribute('aria-hidden', String(!isOpen));
                openButton.setAttribute('aria-expanded', String(isOpen));
            };
            openButton.addEventListener('click', () => setSidebarOpen(true));
            closeButtons.forEach((button) => button.addEventListener('click', () => setSidebarOpen(false)));
            document.addEventListener('keydown', (event) => {
                if (event.key === 'Escape') {
                    setSidebarOpen(false);
                }
            });
        })();
    </script>

    <main class="container-fluid py-4 py-md-5">
        <div class="row justify-content-center">
            <section class="col-12 col-lg-9" aria-label="Formulário de cadastro de produto">
                <div class="card border-0 rounded-3 shadow-lg p-3 p-md-5">
                    <div class="card-body py-lg-5">
                        <div class="row gy-4 gx-lg-4">
                            <div class="col-12 col-md-4">
                                <label for="nome-produto" class="form-label fw-semibold">Nome do produto</label>
                                <input id="nome-produto" class="form-control" type="text"
                                    placeholder="Insira o nome do produto">
                            </div>

                            <div class="col-12 col-md-4">
                                <label for="fornecedor-produto" class="form-label fw-semibold">Fornecedor</label>
                                <select id="fornecedor-produto" class="form-select">
                                    <option value="" selected>Escolha o fornecedor</option>
                                </select>
                            </div>

                            <div class="col-12 col-md-4">
                                <label for="categoria-produto" class="form-label fw-semibold">Categoria</label>
                                <select id="categoria-produto" class="form-select">
                                    <option value="" selected>Escolha a categoria</option>
                                </select>
                            </div>

                            <div class="col-12 col-md-5">
                                <label for="quantidade-minima" class="form-label fw-semibold">Quantidade mínima</label>
                                <input id="quantidade-minima" class="form-control" type="number" min="0"
                                    placeholder="Insira a quantidade mínima do produto">
                            </div>

                            <div class="col-12 col-md-3">
                                <label for="fornecimento-dia" class="form-label fw-semibold">Data de fornecimento</label>
                                <div class="input-group">
                                    <input id="fornecimento-dia" class="form-control text-center px-1" type="text"
                                        inputmode="numeric" maxlength="2" placeholder="DD" aria-label="Dia do fornecimento">
                                    <input class="form-control text-center px-1" type="text" inputmode="numeric"
                                        maxlength="2" placeholder="MM" aria-label="Mês do fornecimento">
                                    <input class="form-control text-center px-1" type="text" inputmode="numeric"
                                        maxlength="4" placeholder="YYYY" aria-label="Ano do fornecimento">
                                </div>
                            </div>

                            <div class="col-12 col-md-3">
                                <label for="validade-dia" class="form-label fw-semibold">Data de validade</label>
                                <div class="input-group">
                                    <input id="validade-dia" class="form-control text-center px-1" type="text"
                                        inputmode="numeric" maxlength="2" placeholder="DD" aria-label="Dia da validade">
                                    <input class="form-control text-center px-1" type="text" inputmode="numeric"
                                        maxlength="2" placeholder="MM" aria-label="Mês da validade">
                                    <input class="form-control text-center px-1" type="text" inputmode="numeric"
                                        maxlength="4" placeholder="YYYY" aria-label="Ano da validade">
                                </div>
                            </div>

                            <div class="col-12 col-lg-8 mx-auto text-center">
                                <label for="descricao-produto" class="form-label fw-semibold">Descrição do produto</label>
                                <textarea id="descricao-produto" class="form-control" rows="1"
                                    placeholder="Insira a descrição do produto (opcional)"></textarea>
                            </div>
                        </div>

                        <div class="d-flex justify-content-center mt-5">
                            <a class="btn btn-danger fw-semibold py-3 px-5" href="{{ route('tela_estoque') }}" style="background-color: #E40520; border-color: #E40520; border-radius: 25px; font-size: 18px;">
                                Cadastrar produto <i class="bi bi-arrow-right ms-1" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>
@endsection
