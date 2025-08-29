<div class="col">
    <a href="/produto/{{ $favoritos->id }}" class="text-decoration-none text-reset">
        <div class="card h-100 border-0 shadow-sm wishlist-product-card">
            <img src="{{  asset('storage/' . $favoritos->imagem)  }}" class="card-img-top" alt="Nome do Produto">
            <div class="card-body d-flex flex-column">
                <h5 class="card-title fs-6">{{ $favoritos->nome }}</h5>
                <p class="h4 fw-bold mt-2" style="color: var(--cor-texto-primario);">R${{ $favoritos->preco }}</p>
                <p class="small text-muted">em 12x de R$ {{ $favoritos->preco }}</p>
                <div class="mt-auto d-grid">
                    <a href="#" class="btn btn-add-to-cart">Adicionar ao Carrinho</a>
                </div>
            </div>
            <form action="{{ route('favoritos.remover') }}" method="post" class="card-footer bg-transparent border-0 text-center">
                @csrf
                <input type="hidden" name="produto_id" value="{{ $favoritos->id }}">
                <button type="submit" class="btn-remove-wishlist text-decoration-none small border-0 bg-transparent">
                    <i class="bi bi-trash3"></i> Remover da lista
                </button>
            </form>
            {{-- <div class="card-footer bg-transparent border-0 text-center">
                <a href="#" class="btn-remove-wishlist text-decoration-none small">
                    <i class="bi bi-trash3"></i> Remover da lista
                </a>
            </div> --}}
        </div>
    </a>
</div>
