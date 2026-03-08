@extends('layouts.simples')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/Cores.css') }}">
    <link rel="stylesheet" href="{{ asset('css/Produto.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endpush

@push('script')
    @vite('resources/js/produtoShow.js')
    @vite('resources/js/ajaxCarrinho.js')
@endpush

@section('title', $produto->nome)

@section('conteudo')
<div class="container my-5">
    <div class="card">
        <div class="pb-4 card-body">
            <div class="row">
                <div class="col-lg-5 d-flex">
                    <ul class="product-thumbnails me-3 list-unstyled">
                        <li class="active">
                            <img src="{{ asset('storage/' . $produto->imagem) }}" alt="Thumbnail 1">
                        </li>
                        <li>
                            <img src="{{ asset('storage/' . $produto->imagem) }}" alt="Thumbnail 2">
                        </li>
                        <li>
                            <img src="{{ asset('storage/' . $produto->imagem) }}" alt="Thumbnail 3">
                        </li>
                        <li>
                            <img src="{{ asset('storage/' . $produto->imagem) }}" alt="Thumbnail 4">
                        </li>
                    </ul>
                    <div class="main-image-container flex-grow-1">
                        <img src="{{ asset('storage/' . $produto->imagem) }}" class="img-fluid" alt="Imagem Principal do Produto">
                    </div>
                </div>

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
                        <div class="ms-auto">
                            <button type="button"
                                id="btnFavorito"
                                class="p-2 border-0 bi {{ in_array($produto->id, $favoritosIds) ? 'bi-heart-fill text-danger' : 'bi-heart' }} fs-4 rounded-circle lh-1"
                                data-id="{{ $produto->id }}">
                            </button>
                        </div>
                    @endauth
                    </div>

                    <p class="mb-1 d-inline-block text-muted text-decoration-line-through">
                        R$ {{ number_format($produto->preco, 2, ',', '.') }}
                    </p>
                    <span class="inline-block fs-6 fw-bold ms-2 destaque">{{ $desconto }}% OFF</span>

                    <p class="mb-1 h2 fw-bold" data-precounitario="{{ $produto->preco }}">
                        R$ {{ number_format($produto->preco, 2, ',', '.') }}
                        <span class="fs-6 destaque fw-normal">{{ $desconto }}% off no Pix ou no débito</span>
                    </p>

                    <div class="mb-3">
                        <p class="mb-1 text-muted">
                            💳 ou em até
                            <strong class="text-dark">
                                {{ $melhorParcela['parcelas'] }}x de R$ {{ number_format($melhorParcela['valor_parcela'], 2, ',', '.') }}
                            </strong>
                            @if(!$melhorParcela['com_juros'])
                                <span class="badge bg-success">sem juros</span>
                            @endif
                        </p>

                        <details class="mt-2">
                            <summary class="text-primary" style="cursor: pointer; user-select: none;">
                                Ver todas as opções de parcelamento
                            </summary>
                            <ul class="mt-2 list-unstyled small">
                                @foreach($opcoesParcelamento as $opcao)
                                    <li class="py-1 {{ $opcao['com_juros'] ? 'text-muted' : '' }}">
                                        <span class="fw-bold">{{ $opcao['parcelas'] }}x</span> de R$ {{ number_format($opcao['valor_parcela'], 2, ',', '.') }}
                                        @if($opcao['com_juros'])
                                            <small class="text-muted">(Total: R$ {{ number_format($opcao['valor_total'], 2, ',', '.') }})</small>
                                        @else
                                            <span class="text-success">✓ sem juros</span>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        </details>
                    </div>

                    <div class="mt-4">
                        <h5 class="h6 fw-bold">Descrição</h5>
                        <p class="text-muted small">
                            {{ $produto->descricao }}
                        </p>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="card border-secondary">
                        <div class="card-body">
                            <p class="mb-1 destaque fw-bold">Chegada Grátis</p>
                            <p class="small text-muted">
                                Comprado dentro das próximas:
                                <span class="d-inline-block destaque fw-bold" id="regressiva">8h</span>
                            </p>
                            <p class="fw-bold">Estoque Disponível: {{ $produto->estoque }}</p>
                            <div class="gap-2 d-grid">
                                <button class="btn btn-primary btn-lg" id="btnComprar" type="button" data-produto-id="{{ $produto->id }}">Compra agora</button>
                                <button class="btn btn-outline-primary" id="btnCarrinho" type="button" data-produto-id="{{ $produto->id }}">Adicionar no carrinho</button>
                            </div>
                            <hr>
                            <p class="mb-1 small">
                                Vendido por <span class="text-primary fw-bold">{{ $donoProduto['name'] }}</span>
                                <i class="bi bi-check-circle-fill text-primary"></i>
                            </p>
                            <p class="small text-muted">Verificado pelo Bazzary</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
