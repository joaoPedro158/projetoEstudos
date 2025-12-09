@extends('layouts.MainSimples')
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/cores.css') }}">
    <link rel="stylesheet" href="{{ asset('css/carrinhoCompra.css') }}">
    <link rel="stylesheet" href="{{ asset('css/cardCarrinho.css') }}">
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


                    <ul class="mb-0 list-unstyled">

                        @foreach ($carinhoCompra as $item)
                            <x-produto.carinho-card :produto="$item" />
                        @endforeach
                    </ul>

                </div>
            </div>

            {{-- resumo --}}
            <div class="col-lg-4">
                <div class="border-0 shadow-sm card">
                    <div class="p-4 card-body">
                        <h5 class="mb-3 card-title">Resumo da Compra</h5>
                        <hr>
                        <div class="mb-2 d-flex justify-content-between">
                            <span class="text-muted">Produtos(3)</span>
                            <div>
                                <span class="text-muted text-decoration-line-through me-2">R$7.601,95</span>
                                <span class="fw-bold">R$6.912</span>
                            </div>
                        </div>
                        <div class="mb-3 d-flex justify-content-between">
                            <span class="text-muted">Frete</span>
                            <span class="text-success fw-bold">Grátis</span>
                        </div>
                        <a href="#" class="text-primary text-decoration-none fw-bold small">Inserir Cupom</a>
                        <hr class="my-3">
                        <div class="d-flex justify-content-between h5 fw-bold">
                            <span>Total</span>
                            <span>R$6.912</span>
                        </div>
                        <div class="mt-4 d-grid">
                            <button class="btn btn-primary btn-lg" type="button">Compra agora</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
