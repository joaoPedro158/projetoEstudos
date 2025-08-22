@extends('layouts.MainSimples')
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/Cores.css') }}">
    <link rel="stylesheet" href="{{ asset('css/Produto.css') }}">
@endpush
@section('title', $produto->nome)
@section('conteudo')

<div class="container my-5">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <!-- Coluna da Esquerda: Imagens do Produto -->
                    <div class="col-lg-5 d-flex">
                        <!-- Thumbnails Verticais -->
                        <ul class="product-thumbnails me-3 list-unstyled">
                            <li class="active"><img src="{{ asset('storage/' . $produto->imagem) }}" alt="Thumbnail 1"></li>
                            <li><img src="{{ asset('storage/' . $produto->imagem) }}" alt="Thumbnail 2"></li>
                            <li><img src="{{ asset('storage/' . $produto->imagem) }}" alt="Thumbnail 3"></li>
                            <li><img src="{{ asset('storage/' . $produto->imagem) }}" alt="Thumbnail 4"></li>
                        </ul>
                        <!-- Imagem Principal -->
                        <div class="main-image-container flex-grow-1">
                            <img src="{{ asset('storage/' . $produto->imagem) }}" class="img-fluid" alt="Imagem Principal do Produto">
                        </div>
                    </div>

                    <!-- Coluna do Meio: Informações do Produto -->
                    <div class="col-lg-4">
                        <span class="badge bg-warning text-dark mb-2">Mais vendido</span>
                        <h2 class="h4">{{ $produto->nome }}</h2>
                        <div class="d-flex align-items-center mb-3">
                            <span class="me-2">4.8</span>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-half text-warning"></i>
                            <a href="#" class="ms-2 text-muted">(1233)</a>
                        </div>

                        <p class="text-muted text-decoration-line-through mb-1">R$ 2.838,95</p>
                        <p class="h2 fw-bold mb-1">R${{ $produto->preco}} <span class="fs-6 text-success fw-normal">37% off no Pix ou no débito</span></p>
                        <p class="text-muted">ou R$2.099 em 21x R$99,95 sem juros com seu cartão de crédito</p>

                        <!-- Opções de Cor -->
                        <div class="mb-3">
                            <p class="fw-bold mb-1">Cor: Preto</p>
                            <div class="d-flex gap-2">
                                <div class="color-option active d-flex align-items-center gap-2">
                                    <span class="color-swatch" style="background-color: #000;"></span>
                                    <span>Preto</span>
                                </div>
                                <div class="color-option d-flex align-items-center gap-2">
                                    <span class="color-swatch" style="background-color: #add8e6;"></span>
                                    <span>Azul</span>
                                </div>
                            </div>
                        </div>





                    <div class="mt-4">
                        <h5 class="h6 fw-bold">Descrição</h5>
                        <p class="text-muted small">
                            {{ $produto->descricao }}
                        </p>
                    </div>
                    </div>



                    <!-- Coluna da Direita: Caixa de Compra -->
                    <div class="col-lg-3">
                        <div class="card border-secondary">
                            <div class="card-body">
                                <p class="text-success fw-bold mb-1">Chegada Grátis</p>
                                <p class="small text-muted">Comprado dentro das próximas 8h</p>
                                <p class="fw-bold">Estoque Disponível: {{ $produto->estoque }}</p>
                                <div class="mb-3">
                                    <label for="quantity" class="form-label small">Quantidade:</label>
                                    <select class="form-select form-select-sm" id="quantity" style="width: auto;">
                                        <option selected>1 unidade</option>
                                        <option value="2">2 unidades</option>
                                    </select>
                                </div>
                                <div class="d-grid gap-2">
                                    <button class="btn btn-primary btn-lg" type="button">Compra agora</button>
                                    <button class="btn btn-outline-primary" type="button">Adicionar no carrinho</button>
                                </div>
                                <hr>
                                <p class="small mb-1"> Vendido por <span class="text-primary fw-bold">{{ $donoProduto['name'] }}</span> <i class="bi bi-check-circle-fill text-primary"></i></p>
                                <p class="small text-muted">Verificado pelo Bazzary</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
