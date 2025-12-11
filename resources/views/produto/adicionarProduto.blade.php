@extends('layouts.simples')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/adicionarProduto.css') }}">
@endpush
@section('title', 'Adicionar Produto')
@section('conteudo')

    <main class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-7">

                <div class="border-0 shadow-lg card">
                    <div class="py-3 text-center text-white card-header" >
                        <h4 class="mb-0">Cadastrar Novo Produto</h4>
                    </div>
                    <div class="p-4 card-body p-md-5">
                        <form method="POST" action="{{ route('adicionarProduto.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label for="imagem" class="form-label">Imagem do Produto</label>
                                <input type="file" class="form-control @error('imagem') is-invalid @enderror" id="imagem" name="imagem" required>
                                @error('imagem')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="px-2 form-text">
                                    Formatos permitidos: jpeg, png, jpg, gif. Tamanho máximo: 2MB.
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="nome" class="form-label">Nome do Produto</label>
                                <input type="text" class="form-control @error('nome') is-invalid @enderror "
                                    id="nome" name="nome" placeholder="Ex: Celular Samsung Galaxy" value="{{ old('nome') }}" required>

                                @error('nome')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="preco" class="form-label">Preço (R$)</label>
                                <input type="number" class="form-control @error('preco') is-invalid @enderror" id="preco" name="preco"
                                    placeholder="Ex: 1299.90" step="0.01" max="999999.99" value="{{ old('preco') }}" required>
                                @error('preco')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                             <div class="mb-3">
                                <label for="estoque" class="form-label">quantidade de estoque</label>
                                <input type="number" class="form-control @error('estoque') is-invalid @enderror" id="estoque" name="estoque"
                                     value="{{ old('estoque') }}">
                                @error('estoque')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="descricao" class="form-label">Descrição</label>
                                <textarea class="form-control @error('descricao') is-invalid @enderror" id="descricao" name="descricao" rows="4"
                                    placeholder="Detalhes sobre o produto, especificações, etc.">{{ old('descricao') }}</textarea>
                                @error('descricao')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-custom-yellow btn-lg">Cadastrar Produto</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </main>
@endsection
@push('scriptAlert')
    @if (session('success'))
        <script>
            showToast('success', "{{ session('success') }}");
        </script>
    @endif
@endpush

