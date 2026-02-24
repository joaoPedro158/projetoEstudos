@extends('layouts.simples')
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/cores.css') }}">
    <link rel="stylesheet" href="{{ asset('css/carrinhoCompra.css') }}">
    <link rel="stylesheet" href="{{ asset('css/cardCarrinho.css') }}">
@endpush
@push('script')
   @Vite('resources/js/carrinhoCompra.js')
@endpush
@section('title', 'carinho de compras')
@section('conteudo')

    <div class="container mt-4">

        <div class="row g-4">
            {{-- carrinho --}}
            <div class="col-lg-8">
                <div class="pb-2 mb-4 bg-white rounded shadow-sm">
                    <header class="mb-4 border-black border-bottom">
                        <div class="p-4 d-flex align-items-center">
                            <div class="form-check me-3">
                                <input class="form-check-input" type="checkbox" value="" id="selectAllStore" checked>
                            </div>
                            <div>
                                <h4 class="pb-2 mb-0">Loja Samsung</h4>
                                <p class="mb-0"> Loja Oficial <i class="bi bi-patch-check-fill verificado"></i></p>
                            </div>
                        </div>
                    </header>
                    <ul class="mb-0 list-unstyled" id="lista-produto">
                        @forelse ($carrinhoCompra as $item)
                            <x-produto.carinho-card :produto="$item" />
                        @empty
                        <div id="container-vazio">
                            <div class="p-5 text-center">
                                <i class="mb-3 bi bi-cart-x display-1 text-muted"></i>
                                <h3>Seu carrinho está vazio</h3>
                                <p class="text-muted">Parece que você ainda não adicionou nada.</p>
                                <a href="/" class="btn btn-primary">Voltar às compras</a>
                            </div>
                        </div>
                        @endforelse
                    </ul>

                    <template id="template-carrinho-vazio">
                        <div class="p-5 text-center animate__animated animate__fadeIn">
                            <i class="mb-3 bi bi-cart-x display-1 text-muted"></i>
                            <h3>Seu carrinho está vazio</h3>
                            <p class="text-muted">Parece que você ainda não adicionou nada.</p>
                            <a href="/" class="btn btn-primary">Voltar às compras</a>
                        </div>
                    </template>
                </div>
            </div>

            <x-compra.card-resumo-compra />

        </div>
    </div>

@endsection
