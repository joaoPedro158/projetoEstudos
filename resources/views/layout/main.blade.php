<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

         <title>@yield('titlle', 'meu site de laravel')</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <!-- Styles -->
        <link rel="stylesheet" href="/css/style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

       
       

          
    </head> 
    <body>
         <header>
        <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #1C3D5A;">
        <div class="container-fluid">
            
            <a class="navbar-brand" href="/">
                <h1>Bazzary</h1>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link " href="http://127.0.0.1:8000/categoria">categoria</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Oferta</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Cupons</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Baixe o App</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Painel de venda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contato</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Ajuda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                </ul>
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
