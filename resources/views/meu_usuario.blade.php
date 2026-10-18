@extends('Layout.inicial')

@section('title', 'Meu Usuário')

@section('content')
    <header class="estoque-navbar">
        <button class="sidebar-open-button" type="button" aria-label="Abrir menu" aria-controls="estoque-sidebar"
            aria-expanded="false" data-sidebar-open>
            <span></span>
            <span></span>
            <span></span>
        </button>
        <h1 class="estoque-navbar-title">
            <span>Meu</span> perfil
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
            <a class="estoque-sidebar-link active" href="{{ route('tela_meu_usuario') }}" aria-current="page">Meu Usuário</a>
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

    <section class="bg-white border-bottom px-3 px-md-4 py-3 d-flex flex-column flex-sm-row justify-content-between align-items-sm-center gap-2">
        <h2 class="h5 fw-bold mb-0">Suas informações, sempre atualizadas</h2>
        <span class="badge rounded-pill bg-success-subtle text-success-emphasis">
            <i class="bi bi-circle-fill me-1" aria-hidden="true"></i>Conta ativa
        </span>
    </section>

    <main class="container-fluid bg-body-tertiary p-3 p-md-4">
        <div class="row g-4">
            <div class="col-12 col-lg-6">
                <section class="card border rounded-4 shadow-sm mb-3 text-center" aria-label="Resumo do perfil">
                    <div class="card-body py-3">
                        <h3 class="h5 fw-bold mt-2 mb-1">Seu nome</h3>
                        <p class="small text-secondary mb-0">Identificação da conta</p>
                    </div>
                </section>

                <section class="card border rounded-4 shadow-sm" aria-labelledby="acesso-title">
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h3 id="acesso-title" class="h6 fw-bold mb-0">Informações de acesso</h3>
                            <i class="bi bi-lock text-secondary" aria-hidden="true"></i>
                        </div>

                        <p class="small text-secondary mb-3">Somente leitura</p>
                        <dl class="mb-0">
                            <dt class="small text-secondary fw-normal">Cargo</dt>
                            <dd class="fw-semibold mb-3">—</dd>

                            <dt class="small text-secondary fw-normal">Nome de usuário</dt>
                            <dd class="fw-semibold mb-0">—</dd>
                        </dl>
                        <hr class="text-secondary">
                    </div>
                </section>
            </div>

            <div class="col-12 col-lg-6">
                <section class="card border rounded-4 shadow-sm" aria-labelledby="credenciais-title">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center gap-3 mb-4">
                            <span class="bg-body-tertiary rounded-3 p-2 text-secondary">
                                <i class="bi bi-lock" aria-hidden="true"></i>
                            </span>
                            <div>
                                <h3 id="credenciais-title" class="h6 fw-bold mb-1">E-mail e senha</h3>
                                <p class="small text-secondary mb-0">Atualize seu e-mail ou defina uma nova senha para o acesso.</p>
                            </div>
                        </div>

                        <div class="row g-3">
                            <div class="col-12 col-md-6">
                                <label for="email-usuario" class="form-label">E-mail</label>
                                <input id="email-usuario" class="form-control" type="email" placeholder="Seu e-mail">
                            </div>

                            <div class="col-12 col-md-6">
                                <label for="nova-senha" class="form-label">Nova senha</label>
                                <input id="nova-senha" class="form-control" type="password" placeholder="Digite uma nova senha">
                            </div>

                            <div class="col-12">
                                <label for="confirmar-senha" class="form-label">Confirmar nova senha</label>
                                <input id="confirmar-senha" class="form-control" type="password" placeholder="Confirme a nova senha">
                            </div>
                        </div>
                    </div>
                </section>

                <p class="small text-secondary mt-4 mb-3">
                    <i aria-hidden="true"></i>As alterações serão aplicadas somente à sua conta.
                </p>
                <div class="d-flex flex-wrap gap-2">
                    <a class="btn btn-outline-secondary" href="{{ route('tela_estoque') }}">Cancelar</a>
                    <a class="btn btn-danger" href="{{ route('tela_estoque') }}" style="background-color: #E40520; border-color: #E40520;">Salvar alterações</a>
                </div>
            </div>
        </div>
    </main>
@endsection
