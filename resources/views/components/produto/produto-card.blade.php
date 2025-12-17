
    <div style="max-width: 300px;">
    <a href="/produto/{{ $produto->id }}" class="text-decoration-none text-reset">
        <div class="border-0 shadow-sm card h-100 text-decoration-none text-dark">
            {{-- Imagem do Produto --}}
            <img src="{{ asset('storage/' . $produto->imagem) }}" class="p-3 card-img-top" alt="{{ $produto->nome }}">

            {{-- Descrição do Produto --}}
            <div class="px-3 pb-2">
                <p class="mb-0 text-muted small truncate-text">{{ $produto->descricao }}</p>
            </div>

            <div class="card-body d-flex flex-column">
                {{-- Nome do Produto --}}


                {{-- Preço do Produto --}}
                <div class="mt-auto">
                    <h5 class="card-title fs-6">{{ $produto->nome }}</h5>
                    <div class="mb-2">
                        <span class="h3 fw-bold">R$ {{ number_format($produto->preco, 2, ',', '.') }}</span>
                        <p class="mb-0 text-muted small">em 12x de R$ {{ number_format($produto->preco / 12, 2, ',', '.') }}</p>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <span style="color: #587DBD; font-weight: bold;">Frete Grátis</span>
                        <a href="#" id="btnCarrinho" class="fs-4" style="color: #F1C40F;">
                            <i class="bi bi-cart3"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        </a>
    </div>

