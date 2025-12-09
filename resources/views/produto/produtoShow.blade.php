@extends('layouts.MainSimples')
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/Cores.css') }}">
    <link rel="stylesheet" href="{{ asset('css/Produto.css') }}">
@endpush
@push('script')
 @vite('resources/js/produtoShow.js')
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
                            <img src="{{ asset('storage/' . $produto->imagem) }}" class="img-fluid"
                                alt="Imagem Principal do Produto">
                        </div>
                    </div>

                    <!-- Coluna do Meio: Informações do Produto -->
                    <div class="col-lg-4">
                        <span class="mb-2 badge bg-warning text-dark">Mais vendido</span>
                        <h2 class="h4">{{ $produto->nome }}</h2>
                        <div class="mb-3 d-flex align-items-center">
                            <span class="me-2">4.8</span>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-half text-warning"></i>
                            <a href="#" class="ms-2 text-muted">(1233)</a>

                         @auth
                            @if(in_array($produto->id, $favoritosIds))
                            <form action="{{ route('favoritos.remover') }}" method="POST" class="ms-auto">
                                   @csrf
                                   <input type="hidden" name="produto_id" value="{{ $produto->id }}">
                                       <button type="submit"
                                           class="p-2 border-0 bi bi-heart-fill fs-4 borde-none rounded-circle lh-1 btn-favorito text-danger"></button>
                               </form>

                            @else
                               <form action="{{ route('favoritos.adicionar') }}" method="POST" class="ms-auto">
                                   @csrf
                                   <input type="hidden" name="produto_id" value="{{ $produto->id }}">
                                       <button type="submit"
                                           class="p-2 border-0 bi bi-heart fs-4 borde-none rounded-circle lh-1 btn-favorito"></button>
                               </form>
                            @endif
                         @endauth
                        </div>

                        <p class="mb-1 d-inline-block text-muted text-decoration-line-through">R$ {{ $produto->preco }}</p>
                        <span class="inline-block fs-6 text-danger fw-bold ms-2">%{{ $desconto }}</span>
                        <p class="mb-1 h2 fw-bold">R${{ $valorFinal }} <span class="fs-6 text-success fw-normal">37%
                                off no Pix ou no débito</span></p>
                        <p class="text-muted">ou R$2.099 em 21x R$99,95 sem juros com seu cartão de crédito</p>

                        <!-- Opções de Cor -->
                        <div class="mb-3">
                            <p class="mb-1 fw-bold">Cor: Preto</p>
                            <div class="gap-2 d-flex">
                                <div class="gap-2 color-option active d-flex align-items-center">
                                    <span class="color-swatch" style="background-color: #000;"></span>
                                    <span>Preto</span>
                                </div>
                                <div class="gap-2 color-option d-flex align-items-center">
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
                                <p class="mb-1 text-success fw-bold">Chegada Grátis</p>
                                <p class="small text-muted">Comprado dentro das próximas 8h</p>
                                <p class="fw-bold">Estoque Disponível: {{ $produto->estoque }}</p>
                                <div class="mb-3">
                                    <label for="quantity" class="form-label small">Quantidade:</label>
                                    <select class="form-select form-select-sm" id="quantity" style="width: auto;">
                                        <option selected>1 unidade</option>
                                        <option value="2">2 unidades</option>
                                    </select>
                                </div>
                                <div class="gap-2 d-grid">
                                    <button class="btn btn-primary btn-lg" type="button">Compra agora</button>
                                    <button class="btn btn-outline-primary" type="button">Adicionar no carrinho</button>
                                </div>
                                <hr>
                                <p class="mb-1 small"> Vendido por <span
                                        class="text-primary fw-bold">{{ $donoProduto['name'] }}</span> <i
                                        class="bi bi-check-circle-fill text-primary"></i></p>
                                <p class="small text-muted">Verificado pelo Bazzary</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
