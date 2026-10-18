@extends('Layout.inicial')

@section('title', 'estoque')

@section('content')
    <header class="estoque-navbar">
        <button class="sidebar-open-button" type="button" aria-label="Abrir menu" aria-controls="estoque-sidebar"
            aria-expanded="false" data-sidebar-open>
            <span></span>
            <span></span>
            <span></span>
        </button>
        <h1 class="estoque-navbar-title"><span
                style="color: #E40520; font-family: 'Bakbak One', sans-serif;font-size: 50px;">Bem-Vindo</span></h1><a
            style="font-size: 50px;font-family: 'Bakbak One', sans-serif; color: #fffefe;">ao Estoque</a>
    </header>

    <div class="sidebar-backdrop" data-sidebar-close></div>
    <aside class="estoque-sidebar" id="estoque-sidebar" aria-label="Menu principal" aria-hidden="true">
        <div class="estoque-sidebar-heading">
            <span class="estoque-sidebar-brand"
                style="font-size: 45px; font-family: 'Bakbak One', sans-serif; color: #E40520;">SESI</span>
            <button class="sidebar-close-button" type="button" aria-label="Fechar menu" data-sidebar-close>&times;</button>
        </div>
        <nav class="estoque-sidebar-nav">
            <a class="estoque-sidebar-link" href="{{ route('tela_estoque') }}">Estoque</a>
            <a class="estoque-sidebar-link" href="{{ route('tela_produto') }}">Cadastro de Produtos</a>
            <a class="estoque-sidebar-link" href="{{ route('tela_fornecedor') }}">Cadastro de Fornecedores</a>
            <a class="estoque-sidebar-link" href="{{ route('tela_historico_movimentacao') }}">Histórico de Movimentações</a>
            <a class="estoque-sidebar-link" href="{{ route('tela_retirada_produto') }}">Retirada de Produtos</a>
            <a class="estoque-sidebar-link" href="{{ route('tela_gestao_usuario') }}">Gerenciamento de Usuarios</a>
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
                if (event.key === 'Escape') setSidebarOpen(false);
            });
        })();
    </script>
    <div style="display: flex; align-items: center; margin-left: 250px; margin-top: 20px; gap: 20px;">

        <input class="form-control" list="datalistOptions" id="exampleDataList" placeholder="Pesquisar..."
            style="width: 650px; border-radius: 25px;">

        <datalist id="datalistOptions">
            <option value="Arroz">
            <option value="Feijão">
            <option value="Macarrão">
            <option value="Leite">
            <option value="Óleo">
        </datalist>

        <button type="button" class="btn btn-primary btn-lg"
            style="background-color: #E40520; border-color: #E40520; width: 180px; border-color: #060606"
            onclick="mostrarOpcoes()">
            <i class="bi bi-plus-lg"> Cadastrar</i>
        </button>

        <div id="opcoesCadastro" style="display: none; margin-top: 10px;">
            <a class="btn btn-outline-dark" href="{{ route('tela_produto') }}">
                Produto
            </a>

            <a class="btn btn-danger" href="{{ route('tela_fornecedor') }}">
                Fornecedor
            </a>
        </div>

    </div>

    </div>

    <script>
        function mostrarOpcoes() {
            const opcoes = document.getElementById('opcoesCadastro');

            if (opcoes.style.display === 'none') {
                opcoes.style.display = 'block';
            } else {
                opcoes.style.display = 'none';
            }
        }
    </script>
    <p style="margin-left: 150px; margin-top: 20px; color: #666; font-size: 14px;">
        Data da Última Atualização: 07/10/2026
    </p>
    <div class="row justify-content-center g-3 mt-4">

        <div class="col-md-5">
            <div class="card shadow-sm border-0 p-3">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h6 class="card-title mb-0">Total de Produtos Cadastrados</h6>

                        <div class="icone-produto">
                            <i class="bi bi-box-seam"></i>
                        </div>
                    </div>


                    <h2 class="fw-bold mt-3">248</h2>

                    <a>
                        Atualizado em tempo real
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-5">
            <div class="card shadow-sm border-0 p-3">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h6 class="card-title mb-0">Produtos Vencidos (Descarte)</h6>

                        <div class="icone-alerta">
                            <i class="bi bi-exclamation-triangle"></i>
                        </div>
                    </div>

                    <h2 class="fw-bold text-danger mt-3">12</h2>

                    <a>
                        Ação imediata recomendada
                    </a>
                </div>
            </div>
        </div>

    </div>
    <div class="row justify-content-center d-flex">
        <div class="col-10  rounded shadow-lg p-3 mb-5 mt-4 bg-body-tertiary">
            <a href="{{ route('tela_historico_movimentacao') }}"
                style="background-color: #17276f; border-color: #feffff; font-size: 10px; border-radius: 25px;"
                class="btn btn-primary">Histórico</a>
            <h6>Produtos em Estoque</h6>
            <table class="table table table-hover">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Produto</th>
                        <th scope="col">Fornecimento</th>
                        <th scope="col">Qtd.Minima</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Fornecedor</th>
                        <th scope="col">Validade</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
            
            </table>
        </div>
    </div>
@endsection
