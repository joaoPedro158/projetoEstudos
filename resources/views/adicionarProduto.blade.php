@extends('layout.MainSimples')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/cores.css') }}">
<link rel="stylesheet" href="{{ asset('css/adicionarProduto.css') }}">
@endpush
@section('title', 'Adicionar Produto')
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
                            <form method="POST" action="{{ route('adicionarProduto.store')}}" enctype="multipart/form-data">
                                @csrf

                                <!-- Campo Imagem do Produto -->
                                <div class="mb-3">
                                    <label for="image" class="form-label">Imagem do Produto</label>
                                    <input type="file" class="form-control" id="image" name="imagem" required>
                                </div>

                                <!-- Campo Nome do Produto -->
                                <div class="mb-3">
                                    <label for="name" class="form-label">Nome do Produto</label>
                                    <input type="text" class="form-control" id="name" name="nome" placeholder="Ex: Celular Samsung Galaxy" required>
                                </div>

                                <!-- Campo Preço -->
                                <div class="mb-3">
                                    <label for="price" class="form-label">Preço (R$)</label>
                                    <input type="number" class="form-control" id="price" name="preco" placeholder="Ex: 1299.90" step="0.01" required>
                                </div>

                                <!-- Campo Descrição -->
                                <div class="mb-4">
                                    <label for="description" class="form-label">Descrição</label>
                                    <textarea class="form-control" id="description" name="descricao" rows="4" placeholder="Detalhes sobre o produto, especificações, etc."></textarea>
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
