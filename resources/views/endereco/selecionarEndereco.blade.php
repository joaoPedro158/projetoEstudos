@extends('layouts.simples')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/cardEndereco.css') }}">
@endpush

@push('script')
@endpush
@section('title', 'endereço')
@section('conteudo')


    <div class="container mt-4">

        <div class="row g-4">
            {{-- carrinho --}}
            <div class="col-lg-8">
                <div class="pb-2 mb-4 bg-white rounded shadow-sm">

                </div>
            </div>

            {{-- resumo --}}
            <div class="col-lg-4">
                <div class="border-0 shadow-sm card">
                    <div class="p-4 card-body">
                        <h5 class="mb-3 card-title">Resumo da Compra</h5>
                        <hr>
                        <div class="mb-2 d-flex justify-content-between">
                            <span class="text-muted">Produtos(<span id="quantidadeProdutos">0</span>)</span>
                            <div>
                                <span class="fw-bold" id="precoBruto">R$ 0,00</span>
                            </div>
                        </div>
                        <div class="mb-3 d-flex justify-content-between">
                            <span class="text-muted"> desconto</span>
                            <span class="fw-bold" id="precoDescontado">R$ 0,00</span>
                        </div>
                        <a href="#" class="text-primary text-decoration-none fw-bold small">Inserir Cupom</a>
                        <hr class="my-3">
                        <div class="d-flex justify-content-between h5 fw-bold">
                            <span>Total Final</span>
                            <span id="totalFinal">0,00</span>
                        </div>
                        <div class="mt-4 d-grid">
                           <a class="btn btn-primary btn-lg" href="{{ route('endereco.index') }}">Compra agora</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
