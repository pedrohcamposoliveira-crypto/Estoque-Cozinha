@extends('Layout.cadastros')

@section('title', 'fornecedor')

@section('content')
    <header class="estoque-navbar">
        <button class="sidebar-open-button" type="button" aria-label="Abrir menu" aria-controls="estoque-sidebar"
            aria-expanded="false" data-sidebar-open>
            <span></span>
            <span></span>
            <span></span>
        </button>
        <h1 class="estoque-navbar-title"><span
                style="color: #E40520; font-family: 'Bakbak One', sans-serif;font-size: 50px;">Cadastro</span></h1><a
            style="font-size: 50px;font-family: 'Bakbak One', sans-serif; color: #fffefe;">de Fornecedores</a>
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

    <div class="row justify-content-center d-flex">
        <div class="col-10  rounded shadow-lg p-3 mb-5 mt-4 bg-body-tertiary">

        @endsection
