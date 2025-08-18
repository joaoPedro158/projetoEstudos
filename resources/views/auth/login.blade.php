@extends('layouts.MainSimples')

@push('styles')
   <link rel="stylesheet" href="/css/CriarConta.css">
@endpush

@section('title', 'Login')

@section('conteudo')

<main class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">

            <div class="card shadow-lg border-0">
                <div class="card-header text-white text-center py-3" style="background-color: var(--cor-primaria-escura);">
                    <h4 class="mb-0">Acessar sua Conta</h4>
                </div>
                <div class="card-body p-4 p-md-5">

                    {{-- Mensagens de erro de validação --}}
                    @if (session('status'))
                        <div class="mb-4 font-medium text-sm text-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <x-validation-errors class="mb-4" />

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <!-- Campo E-mail -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Endereço de E-mail</label>
                            <input type="email" class="form-control" id="email" name="email" :value="old('email')" required autofocus>
                        </div>

                        <!-- Campo Senha -->
                        <div class="mb-3">
                            <label for="password" class="form-label">Senha</label>
                            <input type="password" class="form-control" id="password" name="password" required autocomplete="current-password">
                        </div>

                        <!-- Lembrar-me e Esqueceu a senha -->
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember">
                                <label class="form-check-label" for="remember">
                                    Lembrar-me
                                </label>
                            </div>
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}">Esqueceu a senha?</a>
                            @endif
                        </div>

                        <!-- Botão de Login -->
                        <div class="d-grid">
                            <button type="submit" class="btn btn-custom-yellow btn-lg">Entrar</button>
                        </div>
                    </form>

                    <hr class="my-4">

                    <div class="text-center">
                        <p class="mb-0">Não tem uma conta? <a href="{{ route('register') }}">Crie uma aqui</a></p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</main>

@endsection
