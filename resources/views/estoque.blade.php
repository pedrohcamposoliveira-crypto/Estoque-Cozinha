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
            <a class="estoque-sidebar-link active" href="{{ route('tela_estoque') }}">Estoque</a>
            <a class="estoque-sidebar-link" href="{{ route('tela_login') }}">Cadastro de Usuários</a>
            <a class="estoque-sidebar-link" href="{{ route('tela_login') }}">Cadastro de Produtos</a>
            <a class="estoque-sidebar-link" href="{{ route('tela_fornecedor') }}">Cadastro de Fornecedores</a>
            <a class="estoque-sidebar-link" href="{{ route('tela_login') }}">Histórico de Movimentações</a>
            <a class="estoque-sidebar-link" href="{{ route('tela_login') }}">Retirada de Produtos</a>
            <a class="estoque-sidebar-link" href="{{ route('tela_login') }}">Gerenciamento de Usuarios</a>
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
            <button type="button" class="btn btn-outline-dark">
                Produto
            </button>

            <button type="button" class="btn btn-danger">
                Fornecedor
            </button>
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
            <button type="button"
                style="background-color: #17276f; border-color: #feffff; font-size: 10px; border-radius: 25px;"
                class="btn btn-primary">Histórico</button>
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
                <tbody>

                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>


                        <td>Mercearia</td>


                        <td>Fornecedor Central</td>


                        <td>15/04/2027</td>


                        <td>
                            <button class="btn btn-danger btn-sm"
                                style="background-color: #E40520; border-color: #010101"><i
                                    class="bi bi-trash"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Feijão</td>
                        <td>12/09/2026</td>
                        <td>30 kg</td>
                        <td>Grãos</td>
                        <td>Distribuidora Silva</td>
                        <td>20/05/2027</td>
                        <td>
                            <button class="btn btn-danger btn-sm"
                                style="background-color: #E40520; border-color: #010101;"><i
                                    class="bi bi-trash"></i></button>
                        </td>
                    </tr>

                    <tr>
                        <th scope="row">3</th>
                        <td>Leite</td>
                        <td>15/09/2026</td>
                        <td>20 L</td>
                        <td>Laticínios</td>
                        <td>Laticínios Brasil</td>
                        <td>10/10/2026</td>
                        <td>
                            <button class="btn btn-danger btn-sm"
                                style="background-color: #E40520; border-color: #010101;"><i
                                    class="bi bi-trash"></i></button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
