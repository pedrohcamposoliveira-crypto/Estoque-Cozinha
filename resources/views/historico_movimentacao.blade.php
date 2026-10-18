@extends('Layout.inicial')

@section('title', 'Histórico de Movimentação')

@section('content')
    <header class="estoque-navbar">
        <button class="sidebar-open-button" type="button" aria-label="Abrir menu" aria-controls="estoque-sidebar"
            aria-expanded="false" data-sidebar-open>
            <span></span>
            <span></span>
            <span></span>
        </button>
        <h1 class="estoque-navbar-title">
            <span>Histórico</span> de Movimentação
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

    <main class="container py-4 py-md-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-6">
                <div class="input-group rounded-pill bg-body-secondary overflow-hidden">
                    <span class="input-group-text border-0 bg-transparent" aria-hidden="true">
                        <i class="bi bi-list"></i>
                    </span>
                    <input class="form-control border-0 bg-transparent shadow-none" list="datalistOptions"
                        id="historico-search" placeholder="Pesquisar" aria-label="Pesquisar movimentações">
                    <datalist id="datalistOptions">
                        <option value="Arroz">
                        <option value="Feijão">
                        <option value="Macarrão">
                        <option value="Leite">
                        <option value="Óleo">
                    </datalist>
                    <button class="input-group-text border-0 bg-transparent" type="button" aria-label="Pesquisar">
                        <i class="bi bi-search"></i>
                    </button>
                </div>
            </div>
        </div>

        <div class="row justify-content-center mt-4">
            <div class="col-12 col-lg-10">
                <p class="small text-secondary mb-2">Data da última atualização: --</p>
                <section class="card shadow-sm border rounded-3 overflow-hidden" aria-labelledby="historico-title">
                    <div class="card-header bg-white py-3">
                        <h2 id="historico-title" class="h6 fw-semibold mb-0">Histórico Geral</h2>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover table-sm align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col">Data</th>
                                    <th scope="col">Tipo de movimentação</th>
                                    <th scope="col">Produto</th>
                                    <th scope="col">Quantidade</th>
                                    <th scope="col">Funcionário</th>
                                    <th scope="col">Observação</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="6" class="text-center text-secondary py-4">
                                        Nenhuma movimentação para exibir.
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="card-footer bg-white d-flex justify-content-between align-items-center gap-3">
                        <small class="text-secondary">Mostrando 0 movimentações</small>
                        <nav aria-label="Paginação do histórico">
                            <ul class="pagination pagination-sm mb-0">
                                <li class="page-item disabled"><button class="page-link" type="button" disabled>Anterior</button></li>
                                <li class="page-item disabled"><button class="page-link" type="button" disabled>Próximo</button></li>
                            </ul>
                        </nav>
                    </div>
                </section>
            </div>
        </div>
    </main>
@endsection
