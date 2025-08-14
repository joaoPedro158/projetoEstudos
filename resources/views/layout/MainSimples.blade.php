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
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

        <!-- Bootstrap Icons -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

        <!-- SweetAlert2 CSS -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>






        @stack('styles')
    </head>


     <body>

        <header class="shadow-sm">
            <!-- Linha Principal: Logo e Link de Ajuda -->
            <div class="py-3" style="background-color: #1C3D5A;">
                <div class="container">
                    <!-- Usando d-flex e justify-content-between para alinhar os itens -->
                    <div class="d-flex align-items-center justify-content-between">
                        <!-- Logo na Esquerda -->
                        <a href="/" class="d-flex align-items-center text-white text-decoration-none pb-2">
                            <h1 class="mb-0 h2">Bazzary</h1>
                        </a>

                        <!-- Link de Ajuda na Direita -->
                        <a href="{{route('home.index')}}" class="text-white text-decoration-none">
                            Precisa de ajuda?
                        </a>
                    </div>
                </div>
            </div>
        </header>

        <main>
            @yield('conteudo')
        </main>

          <footer>
            <p>&copy; {{ date('Y') }} Projeto Estudos. All rights reserved.</p>
        </footer>

         <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

        <!-- chart.js-->
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <script src="/js/script.js"></script>

        @stack('scripts')

    </body>
</html>
