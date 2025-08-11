@extends('layout.MainSimples')
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/Cores.css') }}">
    <link rel="stylesheet" href="{{ asset('css/CriarConta.css') }}">
@endpush
@section('title', 'Produto')
@section('conteudo')

<div class="container my-5">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <!-- Coluna da Esquerda: Imagens do Produto -->
                    <div class="col-lg-5 d-flex">
                        <!-- Thumbnails Verticais -->
                        <ul class="product-thumbnails me-3">
                            <li class="active"><img src="https://placehold.co/100x100/EFEFEF/333333?text=Img+1" alt="Thumbnail 1"></li>
                            <li><img src="https://placehold.co/100x100/EFEFEF/333333?text=Img+2" alt="Thumbnail 2"></li>
                            <li><img src="https://placehold.co/100x100/EFEFEF/333333?text=Img+3" alt="Thumbnail 3"></li>
                            <li><img src="https://placehold.co/100x100/EFEFEF/333333?text=Img+4" alt="Thumbnail 4"></li>
                        </ul>
                        <!-- Imagem Principal -->
                        <div class="main-image flex-grow-1 text-center">
                            <img src="https://placehold.co/600x600/EFEFEF/333333?text=Produto" class="img-fluid rounded" alt="Imagem Principal do Produto">
                        </div>
                    </div>

                    <!-- Coluna do Meio: Informações do Produto -->
                    <div class="col-lg-4">
                        <span class="badge bg-warning text-dark mb-2">Mais vendido</span>
                        <h2 class="h4">Celular Samsung Galaxy A16, 128gb + 4gb Ram, Câmera De Até 50mp, Tela 6.7", Nfc, Ip54, Bateria 5000 Mah Cinza</h2>
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
                        <p class="h2 fw-bold mb-1">R$1.889,10 <span class="fs-6 text-success fw-normal">37% off no Pix ou no débito</span></p>
                        <p class="text-muted">ou R$2.099 em 21x R$99,95 sem juros com seu cartão de crédito</p>

                        <!-- Opções de Cor -->
                        <div class="mb-3">
                            <p class="fw-bold mb-1">Cor: Preto</p>
                            <div class="d-flex gap-2">
                                <div class="color-option active d-flex align-items-center gap-2">
                                    <span class="color-swatch preto"></span>
                                    <span>Preto</span>
                                </div>
                                <div class="color-option d-flex align-items-center gap-2">
                                    <span class="color-swatch azul"></span>
                                    <span>Azul</span>
                                </div>
                                <div class="color-option d-flex align-items-center gap-2">
                                    <span class="color-swatch prata"></span>
                                    <span>Prata</span>
                                </div>
                            </div>
                        </div>

                        <!-- Opções de Memória -->
                        <div class="mb-4">
                            <p class="fw-bold mb-1">Memória interna:</p>
                             <div class="d-flex gap-2">
                                <div class="memory-option active">128GB</div>
                                <div class="memory-option">256GB</div>
                            </div>
                        </div>

                        <h5 class="h6 fw-bold">O que você precisa saber sobre este produto</h5>
                        <ul class="list-unstyled text-muted small">
                            <li><i class="bi bi-check-circle me-1"></i> Memória RAM: 8 GB</li>
                            <li><i class="bi bi-check-circle me-1"></i> Dispositivo desbloqueado.</li>
                            <li><i class="bi bi-check-circle me-1"></i> Compatível com redes 5G.</li>
                            <li><i class="bi bi-check-circle me-1"></i> Tela Super AMOLED de 6.7".</li>
                            <li><i class="bi bi-check-circle me-1"></i> Câmera frontal de 12Mpx.</li>
                        </ul>
                    </div>

                    <!-- Coluna da Direita: Caixa de Compra -->
                    <div class="col-lg-3">
                        <div class="card border-secondary">
                            <div class="card-body">
                                <p class="text-success fw-bold mb-1">Chegada Grátis</p>
                                <p class="small text-muted">Comprado dentro das próximas 8h</p>
                                <p class="fw-bold">Estoque Disponível</p>
                                <div class="mb-3">
                                    <label for="quantity" class="form-label small">Quantidade:</label>
                                    <select class="form-select form-select-sm quantity-selector" id="quantity">
                                        <option selected>1 unidade</option>
                                        <option value="2">2 unidades</option>
                                        <option value="3">3 unidades</option>
                                    </select>
                                </div>
                                <div class="d-grid gap-2">
                                    <button class="btn btn-primary btn-lg" type="button">Compra agora</button>
                                    <button class="btn btn-outline-primary" type="button">Adicionar no carrinho</button>
                                </div>
                                <hr>
                                <p class="small mb-1">Loja oficial da <span class="text-primary fw-bold">Samsung</span> <i class="bi bi-check-circle-fill text-primary"></i></p>
                                <p class="small text-muted">Vendido pelo Bazzary</p>
                                <hr>
                                <div class="d-flex align-items-center small mb-2">
                                    <i class="bi bi-arrow-return-left me-2 text-primary"></i>
                                    <div><span class="text-primary">Devolução Grátis.</span> Você tem 30 dias a partir da data de recebimento</div>
                                </div>
                                <div class="d-flex align-items-center small">
                                    <i class="bi bi-shield-check me-2 text-primary"></i>
                                    <div><span class="text-primary">Compra Garantida.</span> Receba seu produto ou devolvemos seu dinheiro</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
