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
                <div class="shadow-sm rounded bg-white pb-2">
                    <header class="border-bottom border-black mb-4">
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


                    <ul class="list-unstyled mb-0">

                        @foreach ($carinhoCompra as $item)
                            <x-produto.carinho-card :produto="$item" />
                        @endforeach
                    </ul>

                </div>
            </div>

            {{-- resumo --}}
            <div class="col-lg-4">
                <div class="card shadow-sm border-0">
                    <div class="card-body p-4">
                        <h5 class="card-title mb-3">Resumo da Compra</h5>
                        <hr>
                        <div class="d-flex justify-content-between mb-2">
                            <span class="text-muted">Produtos(3)</span>
                            <div>
                                <span class="text-muted text-decoration-line-through me-2">R$7.601,95</span>
                                <span class="fw-bold">R$6.912</span>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between mb-3">
                            <span class="text-muted">Frete</span>
                            <span class="text-success fw-bold">Grátis</span>
                        </div>
                        <a href="#" class="text-primary text-decoration-none fw-bold small">Inserir Cupom</a>
                        <hr class="my-3">
                        <div class="d-flex justify-content-between h5 fw-bold">
                            <span>Total</span>
                            <span>R$6.912</span>
                        </div>
                        <div class="d-grid mt-4">
                            <button class="btn btn-primary btn-lg" type="button">Compra agora</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
