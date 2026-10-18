@extends('Layout.inicial')

@section('title', 'Gestão de Usuários')

@section('content')
    <header class="estoque-navbar">
        <button class="sidebar-open-button" type="button" aria-label="Abrir menu" aria-controls="estoque-sidebar"
            aria-expanded="false" data-sidebar-open>
            <span></span>
            <span></span>
            <span></span>
        </button>
        <h1 class="estoque-navbar-title">
            <span>Gestão de</span> Usuários
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
            <a class="estoque-sidebar-link" href="{{ route('tela_gestao_usuario') }}"">Gerenciamento de Usuários</a>
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

    <main class="container-fluid px-3 px-lg-5 py-4">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-7 col-xl-6">
                <div class="input-group rounded-pill bg-body-secondary overflow-hidden">
                    <span class="input-group-text border-0 bg-transparent" aria-hidden="true">
                        <i class="bi bi-list"></i>
                    </span>
                    <input class="form-control border-0 bg-transparent shadow-none" type="search"
                        placeholder="Pesquisar por nome, e-mail ou perfil" aria-label="Pesquisar usuários">
                    <button class="input-group-text border-0 bg-transparent" type="button" aria-label="Pesquisar">
                        <i class="bi bi-search"></i>
                    </button>
                </div>
            </div>
        </div>

        <div class="row justify-content-center mt-3">
            <div class="col-12 col-xl-10">
                <p class="small text-secondary mb-3">Última atualização: hoje, às 10:42</p>

                <div class="bg-body-tertiary rounded-3 p-3 p-md-4">
                    <div class="row g-3 mb-4">
                        <div class="col-12 col-md-4">
                            <section class="card h-100 shadow-sm border rounded-4" aria-label="Total de usuários">
                                <div class="card-body p-4">
                                    <p class="text-secondary mb-2">Total de usuários</p>
                                    <p class="h2 fw-bold mb-0">0</p>
                                </div>
                            </section>
                        </div>
                        <div class="col-12 col-md-4">
                            <section class="card h-100 shadow-sm border border-success-subtle rounded-4" aria-label="Usuários ativos">
                                <div class="card-body p-4">
                                    <p class="text-secondary mb-2">Usuários ativos</p>
                                    <p class="h2 fw-bold text-success mb-0">0</p>
                                </div>
                            </section>
                        </div>
                        <div class="col-12 col-md-4">
                            <section class="card h-100 shadow-sm border border-danger-subtle rounded-4" aria-label="Acessos bloqueados">
                                <div class="card-body p-4">
                                    <p class="text-secondary mb-2">Acessos bloqueados</p>
                                    <p class="h2 fw-bold text-danger mb-0">0</p>
                                </div>
                            </section>
                        </div>
                    </div>

                    <section class="card shadow-sm border rounded-4 overflow-hidden" aria-labelledby="usuarios-title">
                        <div class="card-header bg-white d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 py-3">
                            <div>
                                <h2 id="usuarios-title" class="h6 fw-bold mb-1">Usuários cadastrados</h2>
                                <p class="small text-secondary mb-0">Gerencie perfis, permissões e acesso ao sistema</p>
                            </div>
                            <select class="form-select form-select-sm w-auto" aria-label="Filtrar usuários por status">
                                <option selected>Todos os status</option>
                                <option>Ativos</option>
                                <option>Bloqueados</option>
                            </select>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-hover align-middle mb-0">
                                <thead class="table-light small text-uppercase">
                                    <tr>
                                        <th scope="col">Usuário</th>
                                        <th scope="col">E-mail</th>
                                        <th scope="col">Perfil</th>
                                        <th scope="col">Cargo</th>
                                        <th scope="col">Último acesso</th>
                                        <th scope="col" class="text-end">Ações</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>

                        <div class="card-footer bg-white d-flex justify-content-between align-items-center gap-3">
                            <small class="text-secondary">Mostrando 0 usuários</small>
                            <nav aria-label="Paginação de usuários">
                                <ul class="pagination pagination-sm mb-0">
                                    <li class="page-item disabled"><button class="page-link" type="button" disabled>Anterior</button></li>
                                    <li class="page-item"><button class="page-link" type="button">Próximo</button></li>
                                </ul>
                            </nav>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </main>
@endsection
