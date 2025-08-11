@extends('layout.MainSimples')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/cores.css') }}">
<link rel="stylesheet" href="{{ asset('css/adicionarProduto.css') }}">
@endpush
@section('title', 'Adionar Produto')
@section('conteudo')



        <!-- Seção Principal com o Formulário de Cadastro de Produto -->
        <main class="container my-5">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-7">

                    <div class="card shadow-lg border-0">
                        <div class="card-header text-white text-center py-3" >
                            <h4 class="mb-0">Cadastrar Novo Produto</h4>
                        </div>
                        <div class="card-body p-4 p-md-5">
                            {{-- O formulário deve apontar para a sua rota de salvar o produto --}}
                            {{-- enctype="multipart/form-data" é ESSENCIAL para upload de imagens --}}
                            <form method="POST" action="{{-- route('products.store') --}}" enctype="multipart/form-data">
                                @csrf {{-- Token de segurança do Laravel --}}

                                <!-- Campo Imagem do Produto -->
                                <div class="mb-3">
                                    <label for="image" class="form-label">Imagem do Produto</label>
                                    <input type="file" class="form-control" id="image" name="image" required>
                                </div>

                                <!-- Campo Nome do Produto -->
                                <div class="mb-3">
                                    <label for="name" class="form-label">Nome do Produto</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Ex: Celular Samsung Galaxy" required>
                                </div>

                                <!-- Campo Preço -->
                                <div class="mb-3">
                                    <label for="price" class="form-label">Preço (R$)</label>
                                    <input type="number" class="form-control" id="price" name="price" placeholder="Ex: 1299.90" step="0.01" required>
                                </div>

                                <!-- Campo Descrição -->
                                <div class="mb-4">
                                    <label for="description" class="form-label">Descrição</label>
                                    <textarea class="form-control" id="description" name="description" rows="4" placeholder="Detalhes sobre o produto, especificações, etc."></textarea>
                                </div>

                                <!-- Botão de Cadastro -->
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
