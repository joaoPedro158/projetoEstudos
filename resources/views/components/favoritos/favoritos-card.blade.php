<div class="col">
    <a href="/produto/{{ $favoritos->id }}" class="text-decoration-none text-reset">
        <div class="border-0 shadow-sm card h-100 wishlist-product-card">
            <img src="{{  asset('storage/' . $favoritos->imagem)  }}" class="card-img-top" alt="Nome do Produto">
            <div class="card-body d-flex flex-column">
                <h5 class="card-title fs-6">{{ $favoritos->nome }}</h5>
                <p class="mt-2 h4 fw-bold" style="color: var(--cor-texto-primario);">R${{ $favoritos->preco }}</p>
                <p class="small text-muted">em 12x de R$ {{ $favoritos->preco }}</p>
                <div class="mt-auto d-grid">
                    <a href="#" class="btn btn-add-to-cart">Adicionar ao Carrinho</a>
                </div>
            </div>
            <form action="{{ route('favoritos.remover') }}" method="post" class="text-center bg-transparent border-0 card-footer">
                @csrf
                <input type="hidden" name="produto_id" value="{{ $favoritos->id }}">
                <button type="submit" class="mb-3 bg-transparent border-0 btn-remove-wishlist text-decoration-none small">
                    <i class="bi bi-trash3"></i> Remover da lista
                </button>
            </form>
            {{-- <div class="text-center bg-transparent border-0 card-footer">
                <a href="#" class="btn-remove-wishlist text-decoration-none small">
                    <i class="bi bi-trash3"></i> Remover da lista
                </a>
            </div> --}}
        </div>
    </a>
</div>
