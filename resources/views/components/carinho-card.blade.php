<head>
<link rel="stylesheet" href="{{ asset('css/cores.css') }}">
<link rel="stylesheet" href="{{ asset('css/cardCarrinho.css') }}">
</head>
<div class="container">

        <div class="cart-item p-3 mb-3 shadow-sm rounded">
            <div class="row align-items-center">

                <!-- Coluna 1: Imagem e Checkbox -->
                <div class="col-12 col-md-2 d-flex align-items-center">
                    <div class="product-image-container me-3">
                        <input class="form-check-input" type="checkbox" value="" id="selectProduct1" checked>
                        <img src="{{ asset('storage/' . $produto->imagem) }}" class="product-image rounded" alt="Nome do Produto">
                    </div>
                </div>

                <!-- Coluna 2: Nome do Produto e Excluir -->
                <div class="col-12 col-md-3">
                    <h6 class="mb-1">{{ $produto->nome }}</h6>
                    <a href="#" class="text-primary small text-decoration-none">Excluir</a>
                </div>

                <!-- Coluna 3: Seletor de Quantidade -->
                <div class="col-6 col-md-3 mt-2 mt-md-0">
                    <div class="input-group">
                        <button class="btn btn-outline-secondary" type="button" onclick="this.nextElementSibling.stepDown()">-</button>
                        <input type="number" class="form-control quantity-input" value="1" min="1" max="50">
                        <button class="btn btn-outline-secondary" type="button" onclick="this.previousElementSibling.stepUp()">+</button>
                    </div>
                    <div class="text-muted small mt-1">+50 disponível</div>
                </div>

                <!-- Coluna 4: Preço -->
                <div class="col-6 col-md-4 mt-2 mt-md-0 text-end">
                    <div class="text-success small">
                        <i class="bi bi-arrow-down"></i> Baixou o Preço
                    </div>
                    <span class="text-muted text-decoration-line-through small d-block">-2% R$ 2.838,95</span>
                    <span class="h5 fw-bold">{{ $produto->preco}}</span>
                </div>

            </div>
        </div>
