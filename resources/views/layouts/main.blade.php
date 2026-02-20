
@extends('layouts.base')

@section('layoutConteudo')
    <!-- INÍCIO DO HEADER -->
    <header class="header ">
        <!-- Primeira Linha: Logo, Busca e Ícones -->
        <div class="container">
            <div class="row align-items-center">
                <!-- Coluna da Esquerda: Logo -->
                <div class="text-center col-md-3 text-md-start">
                    <a class="navbar-brand" href="/">
                        <h1 class="mb-0 text-white">Bazzary</h1>
                    </a>
                </div>

                <!-- Coluna do Meio: Barra de Pesquisa -->
                <div class="my-2 col-md-6 my-md-0">
                    <form class="w-100" role="search" method="GET" action="/">
                        <div class="input-group">


                            <button class="input-group-text" type="submit" id="search-icon">
                                <i class="bi bi-search"></i>
                            </button>

                            <input type="search" id="ibusca" name="busca" class="form-control"
                                placeholder="Buscar produtos..." aria-label="Search" aria-describedby="search-icon">
                        </div>
                    </form>
                </div>

                <!-- Coluna da Direita: Ícones -->
                <div class="col-md-3 d-flex justify-content-center justify-content-md-end align-items-center">
                    <a href="{{ route('carinhoCompra.index') }}" class="text-white me-4 fs-4">
                        <i class="bi bi-cart3"></i> <!-- Ícone de Carrinho -->
                    </a>
                    <a href="#" class="text-white fs-4">
                        <i class="bi bi-person-circle"></i> <!-- Ícone de Perfil -->
                    </a>
                </div>
            </div>
        </div>

        <hr class="my-2 text-white-50">

        <!-- Segunda Linha: Navbar com CEP, Links e Conta -->
        <nav class="navbar navbar-dark">
            <div class="container">
                <div class="row align-items-center w-100">
                    <!-- Lado Esquerdo: CEP -->
                    <div class="col-md-3">
                        <div class="cep-container">
                            <a href="{{ route('cadastrarEndereco.index') }}" class="text-white d-flex align-items-center text-decoration-none">
                                <i class="bi bi-geo-alt-fill me-2 fs-5"></i>
                                <div>
                                    <span class="d-block">Informe seu</span>
                                    <span class="d-block fw-bold">CEP</span>
                                </div>
                            </a>
                        </div>
                    </div>

                    <!-- Meio: Links de Navegação -->
                    <div class="col-md-6">
                        <ul class="flex-row flex-wrap navbar-nav d-flex justify-content-center">
                            <li class="px-2 nav-item"><a class="nav-link" href="{{ route('home.index') }}">Home</a></li>
                            <li class="px-2 nav-item"><a class="nav-link"
                                    href="/">Categorias</a></li>
                            <li class="px-2 nav-item"><a class="nav-link" href="#">Ofertas</a></li>
                            <li class="px-2 nav-item"><a class="nav-link" href="#">Cupons</a></li>
                            <li class="px-2 nav-item"><a class="nav-link" href="#">Baixe o App</a></li>
                            <li class="px-2 nav-item"><a class="nav-link"
                                    href="{{ route('adicionarProduto.index') }}">Adicionar Produto</a></li>
                            <li class="px-2 nav-item"><a class="nav-link" href="{{ route('favoritos.index') }}">Favoritos</a></li>
                        </ul>
                    </div>

                    <div class="col-md-3">
                        <ul class="flex-row flex-wrap navbar-nav d-flex justify-content-end">
                            @guest
                                <li class="px-2 nav-item"><a class="nav-link" href="/register">Crie
                                        sua conta</a></li>
                                <li class="px-2 nav-item"><a class="nav-link" href="/login">Entra</a>
                                </li>
                            @endguest
                            @auth
                                <li class="px-2 nav-item"><a class="nav-link" href="{{ route('Dashboard') }}">Dashboard</a></li>

                                <li class="px-2 nav-item">
                                    <form method="POST" action="{{ route('logout') }}" class="d-inline">
                                        @csrf
                                        <a href="{{ route('logout') }}" class="nav-link"
                                            onclick="event.preventDefault(); this.closest('form').submit();">
                                            Sair
                                        </a>
                                    </form>

                                    </form>
                                </li>

                            @endauth
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <main>
        @yield('conteudo')
    </main>

    <x-layout.footer />
@endsection
