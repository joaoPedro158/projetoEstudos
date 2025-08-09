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
        <link rel="stylesheet" href="/css/style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

        <!-- Bootstrap Icons -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

        
       
    </head> 
    <body>
     <!-- INÍCIO DO HEADER -->
        <header style="background-color: #1C3D5A; padding-top: 1rem; padding-bottom: 1rem;">
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
                        <form class="w-100" role="search">
                            <div class="input-group">
                                <span class="input-group-text" id="search-icon">
                                    <i class="bi bi-search"></i>
                                </span>
                                <input type="search" class="form-control" placeholder="Buscar produtos..." aria-label="Search" aria-describedby="search-icon">
                            </div>
                        </form>
                    </div>

                    <!-- Coluna da Direita: Ícones -->
                    <div class="col-md-3 d-flex justify-content-center justify-content-md-end align-items-center">
                        <a href="#" class="text-white me-4 fs-4">
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
            <nav class="navbar navbar-dark" style="background-color: #1C3D5A;">
                <div class="container">
                    <div class="row align-items-center w-100">
                        <!-- Lado Esquerdo: CEP -->
                        <div class="col-md-3">
                            <div class="cep-container">
                                <a href="#" class="text-white d-flex align-items-center text-decoration-none">
                                    <i class="bi bi-geo-alt-fill me-2 fs-5"></i>
                                    <div>
                                        <span class="d-block" style="font-size: 0.8rem; line-height: 1;">Informe seu</span>
                                        <span class="d-block fw-bold">CEP</span>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <!-- Meio: Links de Navegação -->
                        <div class="col-md-6">
                             <ul class="navbar-nav d-flex flex-row flex-wrap justify-content-center">
                                <li class="nav-item px-2"><a class="nav-link" href="{{route('home.index')}}">Home</a></li>
                                <li class="nav-item px-2"><a class="nav-link" href="{{route('categoria.index')}}">Categorias</a></li>
                                <li class="nav-item px-2"><a class="nav-link" href="#">Ofertas</a></li>
                                <li class="nav-item px-2"><a class="nav-link" href="#">Cupons</a></li>
                                <li class="nav-item px-2"><a class="nav-link" href="#">Baixe o App</a></li>
                                <li class="nav-item px-2"><a class="nav-link" href="#">Ajuda</a></li>
                            </ul>
                        </div>

                        <!-- Lado Direito: Links de Conta (MODIFICADO) -->
                        <div class="col-md-3">
                            <ul class="navbar-nav d-flex flex-row flex-wrap justify-content-end">
                                <li class="nav-item px-2"><a class="nav-link" href="{{route('CriarConta.index')}}">Crie sua conta</a></li>
                                <li class="nav-item px-2"><a class="nav-link" href="{{route('Login.index')}}">Entra</a></li>
                                <li class="nav-item px-2"><a class="nav-link" href="#">Vender</a></li>
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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
         <script src="/js/script.js"></script>
        <footer>
            <p>&copy; {{ date('Y') }} Projeto Estudos. All rights reserved.</p>
        </footer>
    </body>
</html>
