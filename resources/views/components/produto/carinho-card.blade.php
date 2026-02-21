<li class="produto-container">
    <div class="container">

            <div class="p-3 mb-3 rounded shadow-sm cart-item">
                <div class="row align-items-center">

                    <!-- Coluna 1: Imagem e Checkbox -->
                    <div class="col-12 col-md-2 d-flex align-items-center">
                        <div class="form-check me-3">
                         <input class="form-check-input js-check-produto" data-preco="{{  $produto->preco }}" data-id="{{ $produto->id }}" type="checkbox"  value="" id="selectProduct1" >
                            </div>
                        <div class="product-image-container me-1 ">
                            <img src="{{ asset('storage/' . $produto->imagem) }}" class="rounded product-image" alt="Nome do Produto">
                        </div>
                    </div>

                    <!-- Coluna 2: Nome do Produto e Excluir -->
                    <div class="col-12 col-md-3" >
                        <h6 class="mb-1">{{ $produto->nome }}</h6>
                        <a href="#" class="text-primary small text-decoration-none btn-excluir" data-id="{{ $produto->id }}">Excluir</a>
                    </div>

                    <!-- Coluna 3: Seletor de Quantidade -->
                    <div class="mt-2 col-6 col-md-3 mt-md-0">
                        <div class="input-group">
                            <button class="btn btn-outline-secondary" type="button" onclick="this.nextElementSibling.stepDown()">-</button>
                            <input type="number" class="form-control quantity-input" value="{{ $produto->pivot->quantidade }}" min="1" max="10">
                            <button class="btn btn-outline-secondary" type="button" onclick="this.previousElementSibling.stepUp()">+</button>
                        </div>
                        <div class="mt-1 text-muted small">Disponivel: {{ $produto->estoque }}</div>
                    </div>

                    <!-- Coluna 4: Preço -->
                    <div class="mt-2 col-6 col-md-4 mt-md-0 text-end">

                        <span class="h5 fw-bold"> R$ {{ $produto->preco}}</span>
                    </div>

                </div>
            </div>
</li>
