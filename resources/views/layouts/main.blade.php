<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'meu site de laravel')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/Cores.css') }}">
    <link rel="stylesheet" href="{{ asset('css/padrao.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">


    @stack('styles')
</head>
 
<body>
    <!-- INÍCIO DO HEADER -->
    <header class="header ">
        <!-- Primeira Linha: Logo, Busca e Ícones -->
        <div class="container">
            <div class="row align-items-center">
                <!-- Coluna da Esquerda: Logo -->
                <div class="col-md-3 text-center text-md-start">
                    <a class="navbar-brand" href="/">
                        <h1 class="text-white mb-0">Bazzary</h1>
                    </a>
                </div>

                <!-- Coluna do Meio: Barra de Pesquisa -->
                <div class="col-md-6 my-2 my-md-0">
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

        <hr class="text-white-50 my-2">

        <!-- Segunda Linha: Navbar com CEP, Links e Conta -->
        <nav class="navbar navbar-dark">
            <div class="container">
                <div class="row align-items-center w-100">
                    <!-- Lado Esquerdo: CEP -->
                    <div class="col-md-3">
                        <div class="cep-container">
                            <a href="#" class="text-white d-flex align-items-center text-decoration-none">
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
                        <ul class="navbar-nav d-flex flex-row flex-wrap justify-content-center">
                            <li class="nav-item px-2"><a class="nav-link" href="{{ route('home.index') }}">Home</a></li>
                            <li class="nav-item px-2"><a class="nav-link"
                                    href="/">Categorias</a></li>
                            <li class="nav-item px-2"><a class="nav-link" href="#">Ofertas</a></li>
                            <li class="nav-item px-2"><a class="nav-link" href="#">Cupons</a></li>
                            <li class="nav-item px-2"><a class="nav-link" href="#">Baixe o App</a></li>
                            <li class="nav-item px-2"><a class="nav-link"
                                    href="{{ route('adicionarProduto.index') }}">Adicionar Produto</a></li>
                            <li class="nav-item px-2"><a class="nav-link" href="{{ route('favoritos.index') }}">Favoritos</a></li>
                        </ul>
                    </div>

                    <div class="col-md-3">
                        <ul class="navbar-nav d-flex flex-row flex-wrap justify-content-end">
                            @guest
                                <li class="nav-item px-2"><a class="nav-link" href="/register">Crie
                                        sua conta</a></li>
                                <li class="nav-item px-2"><a class="nav-link" href="/login">Entra</a>
                                </li>
                            @endguest
                            @auth
                                <li class="nav-item px-2"><a class="nav-link" href="{{ route('Dashboard') }}">Dashboard</a></li>

                                <li class="nav-item px-2">
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

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="/js/script.js"></script>

     <footer class="footer-bazzary py-5 mt-5">
        <div class="container">
            <div class="row">
                <!-- Coluna 1: Atendimento ao Cliente -->
                <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
                    <h5 class="footer-title">Atendimento ao Cliente</h5>
                    <ul class="footer-links">
                        <li><a href="#">Central de Ajuda</a></li>
                        <li><a href="#">Como comprar</a></li>
                        <li><a href="#">Como vender</a></li>
                        <li><a href="#">Devolução e reembolso</a></li>
                        <li><a href="#">Garantia Bazzary</a></li>
                        <li><a href="#">Fale conosco</a></li>
                    </ul>
                </div>

                <!-- Coluna 2: Sobre o Bazzary -->
                <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
                    <h5 class="footer-title">Sobre o Bazzary</h5>
                    <ul class="footer-links">
                        <li><a href="#">Sobre nós</a></li>
                        <li><a href="#">Política do Bazzary</a></li>
                        <li><a href="#">Política de privacidade</a></li>
                        <li><a href="#">Afiliados</a></li>
                        <li><a href="#">Como ser um vendedor</a></li>
                        <li><a href="#">Bazzary Blog</a></li>
                    </ul>
                </div>

                <!-- Coluna 3: Siga-nos -->
                <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
                    <h5 class="footer-title">Siga-nos</h5>
                    <ul class="footer-links social-links">
                        <li><a href="#"><i class="bi bi-instagram"></i> Instagram</a></li>
                        <li><a href="#"><i class="bi bi-tiktok"></i> Tiktok</a></li>
                        <li><a href="#"><i class="bi bi-whatsapp"></i> Whatsapp</a></li>
                        <li><a href="#"><i class="bi bi-facebook"></i> Facebook</a></li>
                        <li><a href="#"><i class="bi bi-linkedin"></i> Linkedin</a></li>
                    </ul>
                </div>

                <!-- Coluna 4: Temporada -->
                <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
                    <h5 class="footer-title">Temporada</h5>
                    <ul class="footer-links">
                        <li><a href="#">Dia das Mães</a></li>
                        <li><a href="#">Dia do consumidor</a></li>
                        <li><a href="#">Dia dos namorados</a></li>
                        <li><a href="#">Black Friday</a></li>
                        <li><a href="#">Descontão</a></li>
                        <li><a href="#">Fale conosco</a></li>
                    </ul>
                </div>

            </div>
        </div>
    </footer>
</body>

</html>
