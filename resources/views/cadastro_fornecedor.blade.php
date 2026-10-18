@extends('Layout.cadastros')

@section('title', 'Cadastro de Fornecedor')

@section('content')
    <header class="estoque-navbar">
        <button class="sidebar-open-button" type="button" aria-label="Abrir menu" aria-controls="estoque-sidebar"
            aria-expanded="false" data-sidebar-open>
            <span></span>
            <span></span>
            <span></span>
        </button>
        <h1 class="estoque-navbar-title">
            <span>Cadastro</span> de Fornecedor
        </h1>
    </header>

    <div class="sidebar-backdrop" data-sidebar-close></div>
    <aside class="estoque-sidebar" id="estoque-sidebar" aria-label="Menu principal" aria-hidden="true">
        <div class="estoque-sidebar-heading">
            <span class="estoque-sidebar-brand" style="font-size: 45px; font-family: 'Bakbak One', sans-serif; color: #E40520;">SESI</span>
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
            <section class="col-12 col-lg-9" aria-label="Formulário de cadastro de fornecedor">
                <div class="card border-0 rounded-3 shadow-lg px-3 py-4 p-md-5">
                    <div class="card-body d-flex flex-column justify-content-center">
                        <div class="row g-4 g-lg-5">
                            <div class="col-12 col-md-6">
                                <label for="nome-fornecedor" class="form-label fw-semibold">Nome do fornecedor</label>
                                <input id="nome-fornecedor" class="form-control" type="text"
                                    placeholder="Insira o nome do fornecedor" autocomplete="organization">
                            </div>

                            <div class="col-12 col-md-6">
                                <label for="email-fornecedor" class="form-label fw-semibold">E-mail do fornecedor</label>
                                <input id="email-fornecedor" class="form-control" type="email"
                                    placeholder="Insira o e-mail do fornecedor" autocomplete="email">
                            </div>

                            <div class="col-12 col-md-6">
                                <label for="telefone-fornecedor" class="form-label fw-semibold">Telefone do fornecedor</label>
                                <input id="telefone-fornecedor" class="form-control" type="tel"
                                    placeholder="Insira o telefone do fornecedor" autocomplete="tel">
                            </div>

                            <div class="col-12 col-md-6">
                                <label for="cnpj-fornecedor" class="form-label fw-semibold">CNPJ do fornecedor</label>
                                <input id="cnpj-fornecedor" class="form-control" type="text" inputmode="numeric"
                                    placeholder="Insira o CNPJ do fornecedor">
                            </div>

                            <div class="col-12 col-lg-8 mx-auto text-center">
                                <label for="endereco-fornecedor" class="form-label fw-semibold">Endereço do fornecedor</label>
                                <input id="endereco-fornecedor" class="form-control" type="text"
                                    placeholder="Insira o endereço do fornecedor" autocomplete="street-address">
                            </div>
                        </div>

                        <div class="d-flex justify-content-center mt-5">
                            <a class="btn btn-danger fw-semibold py-3 px-5" href="{{ route('tela_estoque') }}" style="background-color: #E40520; border-color: #E40520; border-radius: 25px; font-size: 18px;">
                                Cadastrar fornecedor <i class="bi bi-arrow-right ms-1" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>
@endsection
