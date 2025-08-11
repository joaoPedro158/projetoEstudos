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
                            <h4 class="mb-0">Acessar sua Conta</h4>
                        </div>
                        <div class="card-body p-4 p-md-5">
                            {{-- O formulário deve apontar para a sua rota de login --}}
                            <form method="POST" action="{{-- route('login.auth') --}}">
                                @csrf {{-- Token de segurança do Laravel, essencial! --}}

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

                                <!-- Lembrar-me e Esqueceu a senha -->
                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember">
                                        <label class="form-check-label" for="remember">
                                            Lembrar-me
                                        </label>
                                    </div>
                                    <a href="#">Esqueceu a senha?</a>
                                </div>

                                <!-- Botão de Login -->
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-custom-yellow btn-lg">Entrar</button>
                                </div>
                            </form>

                            <hr class="my-4">

                            <div class="text-center">
                                <p class="mb-0">Não tem uma conta? <a href="{{route('CriarConta.index') }}">Crie uma aqui</a></p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </main>

        @if(session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Sucesso!',
                text: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 2000
            });
        </script>
        @endif

@endsection
