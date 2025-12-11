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

        <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

      <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    @stack('styles')
    @stack('script')
</head>


<body>

    @yield('layoutConteudo')

     <footer class="py-5 footer-bazzary">
        <div class="container">
            <div class="row">
                <!-- Coluna 1: Atendimento ao Cliente -->
                <div class="mb-4 col-lg-3 col-md-6 mb-lg-0">
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
                <div class="mb-4 col-lg-3 col-md-6 mb-lg-0">
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
                <div class="mb-4 col-lg-3 col-md-6 mb-lg-0">
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
                <div class="mb-4 col-lg-3 col-md-6 mb-lg-0">
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

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <!-- chart.js-->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>

      <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script src="/js/script.js"></script>


    @stack('scriptAlert')



</body>

</html>
