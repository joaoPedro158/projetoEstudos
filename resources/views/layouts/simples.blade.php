
@extends('layouts.base')


@section('layoutConteudo')
    <header class="shadow-sm">
        <!-- Linha Principal: Logo e Link de Ajuda -->
        <div class="py-3" style="background-color: #1C3D5A;">
            <div class="container">
                <!-- Usando d-flex e justify-content-between para alinhar os itens -->
                <div class="d-flex align-items-center justify-content-between">
                    <!-- Logo na Esquerda -->
                    <a href="/" class="pb-2 text-white d-flex align-items-center text-decoration-none">
                        <h1 class="mb-0 h2">Bazzary</h1>
                    </a>

                    <!-- Link de Ajuda na Direita -->
                    <a href="{{ route('home.index') }}" class="text-white text-decoration-none">
                        Precisa de ajuda?
                    </a>
                </div>
            </div>
        </div>
    </header>

    <main>
        @yield('conteudo')
    </main>

    <x-layout.footer />
@endsection

