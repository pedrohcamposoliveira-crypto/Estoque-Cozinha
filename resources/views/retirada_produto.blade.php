@extends('Layout.inicial')

@section('title', 'Retirada de Produto')

@section('content')
    <header class="estoque-navbar">
        <button class="sidebar-open-button" type="button" aria-label="Abrir menu" aria-controls="estoque-sidebar"
            aria-expanded="false" data-sidebar-open>
            <span></span>
            <span></span>
            <span></span>
        </button>
        <h1 class="estoque-navbar-title">
            <span>Retirada</span> de Produto
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
            <section class="col-12 col-md-10 col-lg-8 col-xl-7" aria-labelledby="retirada-title">
                <div class="card border rounded-4 shadow-sm">
                    <div class="card-body p-4">
                        <h2 id="retirada-title" class="h6 fw-bold mb-3">Dados da Retirada</h2>

                        <div class="mb-3">
                            <label for="produto-retirada" class="form-label small fw-semibold">Produto</label>
                            <select id="produto-retirada" class="form-select">
                                <option selected>Farinha de Trigo Especial</option>
                                <option>Arroz</option>
                                <option>Feijão</option>
                            </select>
                        </div>

                        <div class="row g-3 mb-3">
                            <div class="col-12 col-md-6">
                                <label for="id-produto" class="form-label small fw-semibold">ID do Produto</label>
                                <div class="input-group">
                                    <input id="id-produto" class="form-control bg-body-tertiary" type="text" value="#001" readonly>
                                    <span class="input-group-text bg-body-tertiary text-secondary" aria-hidden="true">
                                        <i class="bi bi-lock"></i>
                                    </span>
                                </div>
                            </div>

                            <div class="col-12 col-md-6">
                                <label for="quantidade-disponivel" class="form-label small fw-semibold">Quantidade Disponível</label>
                                <div class="input-group">
                                    <input id="quantidade-disponivel" class="form-control bg-body-tertiary fw-semibold"
                                        type="text" value="50 kg" readonly>
                                    <span class="input-group-text bg-body-tertiary text-secondary" aria-hidden="true">
                                        <i class="bi bi-box-seam"></i>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="row g-3 mb-3">
                            <div class="col-12 col-md-6">
                                <label for="quantidade-retirada" class="form-label small fw-semibold">Quantidade a Retirar</label>
                                <div class="input-group border border-danger rounded-3 p-1">
                                    <button class="btn btn-danger-subtle text-danger" type="button" aria-label="Diminuir quantidade">
                                        <i class="bi bi-dash-lg" aria-hidden="true"></i>
                                    </button>
                                    <input id="quantidade-retirada" class="form-control border-0 text-center fw-bold"
                                        type="number" value="10" min="1" aria-label="Quantidade a retirar">
                                    <button class="btn btn-danger-subtle text-danger" type="button" aria-label="Aumentar quantidade">
                                        <i class="bi bi-plus-lg" aria-hidden="true"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="col-12 col-md-6">
                                <label for="unidade-retirada" class="form-label small fw-semibold">Unidade</label>
                                <select id="unidade-retirada" class="form-select">
                                    <option selected>kg (Quilograma)</option>
                                    <option>g (Grama)</option>
                                    <option>L (Litro)</option>
                                    <option>un (Unidade)</option>
                                </select>
                            </div>
                        </div>

                        <div class="row g-3 mb-3">
                            <div class="col-12 col-md-6">
                                <label for="motivo-retirada" class="form-label small fw-semibold">Motivo da Retirada</label>
                                <select id="motivo-retirada" class="form-select">
                                    <option selected>Uso na Cozinha</option>
                                    <option>Descarte</option>
                                    <option>Outro</option>
                                </select>
                            </div>

                            <div class="col-12 col-md-6">
                                <label for="responsavel-retirada" class="form-label small fw-semibold">Responsável pela Retirada</label>
                                <input id="responsavel-retirada" class="form-control" type="text"
                                    placeholder="Insira o responsável">
                            </div>
                        </div>

                        <div>
                            <label for="observacoes-retirada" class="form-label small fw-semibold">Observações</label>
                            <textarea id="observacoes-retirada" class="form-control" rows="3"
                                placeholder="Adicione uma observação (opcional)"></textarea>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-end gap-2 mt-3">
                    <a class="btn btn-outline-secondary" href="{{ route('tela_estoque') }}">Cancelar</a>
                    <a class="btn btn-danger fw-semibold" href="{{ route('tela_estoque') }}" style="background-color: #E40520; border-color: #E40520; border-radius: 25px; font-size: 18px;">
                        Confirmar Retirada
                    </a>
                </div>
            </section>
        </div>
    </main>
@endsection
