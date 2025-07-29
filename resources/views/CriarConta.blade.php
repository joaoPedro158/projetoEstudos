@extends('layout.MainSimples')
@push('styles')
<link rel="stylesheet" href="/css/CriarConta.css">
@endpush
@section('title', 'cadastro')
@section('conteudo')

    <main class="container my-5">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6">
                    
                    <div class="card shadow-lg border-0">
                        <div class="card-header text-white text-center py-3" style="background-color: #1C3D5A;">
                            <h4 class="mb-0">Crie sua Conta</h4>
                        </div>
                        <div class="card-body p-4 p-md-5">
                            {{-- O formulário deve apontar para a sua rota de registro --}}
                            <form method="POST" action="{{-- route('register.store') --}}">
                                {{-- @csrf Token de segurança do Laravel, essencial! --}}

                                <!-- Campo Nome Completo -->
                                <div class="mb-3">
                                    <label for="name" class="form-label">Nome Completo</label>
                                    <input type="text" class="form-control" id="name" name="name" required>
                                </div>

                                <!-- Campo E-mail -->
                                <div class="mb-3">
                                    <label for="email" class="form-label">Endereço de E-mail</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>

                                <!-- Campo Senha -->
                                <div class="mb-3">
                                    <label for="password" class="form-label">Senha</label>
                                    <input type="password" class="form-control" id="password" name="password" required>
                                </div>

                                <!-- Campo Confirmar Senha -->
                                <div class="mb-4">
                                    <label for="password_confirmation" class="form-label">Confirmar Senha</label>
                                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                                </div>

                                <!-- Checkbox de Termos e Condições -->
                                <div class="form-check mb-4">
                                    <input class="form-check-input" type="checkbox" value="" id="terms" required>
                                    <label class="form-check-label" for="terms">
                                        Eu li e aceito os <a href="#">Termos e Condições</a>
                                    </label>
                                </div>

                                <!-- Botão de Cadastro -->
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-custom-yellow btn-lg">Cadastrar</button>
                                </div>
                            </form>

                            <hr class="my-4">

                            <div class="text-center">
                                <p class="mb-0">Já tem uma conta? <a href="{{route('Login.index')}}">Entre aqui</a></p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </main>

@endsection
