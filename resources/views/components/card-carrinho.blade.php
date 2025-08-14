
    <div style="max-width: 300px;">
    <a href="/produto/{{ $produto->id }}" class="text-decoration-none text-reset">
        <div class="card h-100 shadow-sm border-0 text-decoration-none text-dark">
            {{-- Imagem do Produto --}}
            <img src="{{ asset('storage/' . $produto->imagem) }}" class="card-img-top p-3" alt="{{ $produto->nome }}">

            {{-- Descrição do Produto --}}
            <div class="px-3 pb-2">
                <p class="text-muted small mb-0">{{ $produto->descricao }}</p>
            </div>

            <div class="card-body d-flex flex-column">
                {{-- Nome do Produto --}}
                <h5 class="card-title fs-6">{{ $produto->nome }}</h5>

                {{-- Preço do Produto --}}
                <div class="mt-auto">
                    <div class="mb-2">
                        <span class="h3 fw-bold">R$ {{ number_format($produto->preco, 2, ',', '.') }}</span>
                        <p class="text-muted small mb-0">em 12x de R$ {{ number_format($produto->preco / 12, 2, ',', '.') }}</p>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <span style="color: #587DBD; font-weight: bold;">Frete Grátis</span>
                        <a href="#" class="fs-4" style="color: #F1C40F;">
                            <i class="bi bi-cart3"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        </a>
    </div>

