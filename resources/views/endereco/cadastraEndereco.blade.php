@extends('layouts.simples')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/endereco/cadastraEndereco.css') }}">
@endpush
@push('script')
    @Vite('resources/js/cadastraEndereco.js')
@endpush
@push('scriptAlert')
    @if (session('success'))
        <script>
            showToast('success', "{{ session('success') }}");
        </script>
    @endif
@endpush
@section('title', 'endereço')
@section('conteudo')

<main class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-7">

                <div class="border-0 shadow-lg card">
                    <div class="py-3 text-center text-white card-header">
                        <h4 class="mb-0">Cadastrar Novo Endereço</h4>
                    </div>

                    <div class="p-4 card-body p-md-5">
                        <form method="POST" action="{{ route('endereco.store') }}">
                            @csrf

                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label for="cep" class="form-label">CEP</label>
                                    <input type="text" class="form-control @error('cep') is-invalid @enderror"
                                           id="cep" name="cep" placeholder="00000-000" maxlength="9"
                                           value="{{ old('cep') }}" required>
                                    @error('cep')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label for="tipo" class="form-label">Tipo de Localização</label>
                                    <select class="form-select @error('tipo') is-invalid @enderror" id="tipo" name="tipo" required>
                                        <option value="casa" {{ old('tipo') == 'casa' ? 'selected' : '' }}>Casa</option>
                                        <option value="trabalho" {{ old('tipo') == 'trabalho' ? 'selected' : '' }}>Trabalho</option>
                                        <option value="parente" {{ old('tipo') == 'parente' ? 'selected' : '' }}>Casa de Parente</option>
                                        <option value="outro" {{ old('tipo') == 'outro' ? 'selected' : '' }}>Outro</option>
                                    </select>
                                    @error('tipo')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="logradouro" class="form-label">Rua / Logradouro</label>
                                <input type="text" class="form-control @error('logradouro') is-invalid @enderror"
                                       id="logradouro" name="logradouro" placeholder="Ex: Rua Nova"
                                       value="{{ old('logradouro') }}" required>
                                @error('logradouro')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="mb-3 col-md-4">
                                    <label for="numero" class="form-label">Número</label>
                                    <input type="text" class="form-control @error('numero') is-invalid @enderror"
                                           id="numero" name="numero" placeholder="123"
                                           value="{{ old('numero') }}" required>
                                    @error('numero')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-8">
                                    <label for="bairro" class="form-label">Bairro</label>
                                    <input type="text" class="form-control @error('bairro') is-invalid @enderror"
                                           id="bairro" name="bairro" placeholder="Ex: Centro"
                                           value="{{ old('bairro') }}" required>
                                    @error('bairro')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="mb-3 col-md-8">
                                    <label for="cidade" class="form-label">Cidade</label>
                                    <input type="text" class="form-control @error('cidade') is-invalid @enderror"
                                           id="cidade" name="cidade" value="{{ old('cidade') }}" required>
                                    @error('cidade')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-4">
                                    <label for="estado" class="form-label">Estado (UF)</label>
                                    <input type="text" class="form-control @error('estado') is-invalid @enderror"
                                           id="estado" name="estado" placeholder="Ex: SP" maxlength="2"
                                           value="{{ old('estado') }}" required style="text-transform: uppercase;">
                                    @error('estado')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4">
                                <label for="complemento" class="form-label">Complemento (Opcional)</label>
                                <input type="text" class="form-control @error('complemento') is-invalid @enderror"
                                       id="complemento" name="complemento" placeholder="Ex: Apto 101, Próximo ao mercado"
                                       value="{{ old('complemento') }}">
                            </div>

                            <div class="mb-4 form-check">
                                <input type="checkbox" class="form-check-input" id="principal" name="principal" value="1">
                                <label class="form-check-label" for="principal">Definir como endereço principal</label>
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-custom-address btn-lg">Salvar Endereço</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </main>

@endsection
