@extends('layouts.simples')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/endereco/cardEndereco.css') }}">
@endpush

@push('script')
    @Vite('resources/js/selecionarEndereco.js')
@endpush
@section('title', 'endereço')
@section('conteudo')


    <div class="container mt-4">

        <div class="row g-4">
            {{-- carrinho --}}
            <div class="col-lg-8">
    <div class="pb-2 mb-4 bg-white rounded shadow-sm">
        <div class="p-4 card-body">
            <div class="mb-4 d-flex justify-content-between align-items-center">
                <div>
                    <a href="/" class="text-decoration-none btn-sm btn btn-outline-secondary">
                        <i class="bi bi-arrow-left"></i> Voltar ao carrinho
                    </a>
                </div>
                <div class="gap-2 d-flex">
                    <a href= "javascript:void(0)" id="btnEditEndereco" class="border btn btn-sm btn-light">
                         Atualizar Endereço
                    </a>
                    <a href="{{ route('cadastrarEndereco.index') }}" class="btn btn-sm btn-primary">
                        + Novo Endereço
                    </a>
                </div>
            </div>

            <h5 class="mb-3 card-title fw-bold">Selecione um endereço para entrega</h5>
            <hr class="mb-4 opacity-50">

            <div class="endereco-lista">
                @foreach($enderecos as $endereco)
                    <x-compra.card-endereco :endereco="$endereco" :selecionado="$loop->first"/>
                @endforeach
                </div>
            </div>
        </div>
    </div>

            {{-- @dump($checkoutPedido) --}}
           <x-compra.card-resumo-compra />

        </div>
    </div>
@endsection
