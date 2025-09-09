@extends('layouts.main')
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/produto-card.css') }}">
@endpush
@section('title', 'home')
@section('conteudo')
    <div class="container my-5">
        @if ($busca)
            <h2>Buscando por: {{ $busca }}</h2>
        @else
            <div class="mb-4 h-100">
                <h2 class="mb-4">Produtos em Destaque</h2>
            </div>
        @endif

        @if (count($produto) > 0)

            @if (count($produto) > 10)
                <div class="container my-5 p-2 shadow rounded-3 ">
                    <div id="carrosselMultiplosCards" class="carousel slide carousel-dark" data-bs-ride="carousel">
                        <div class="carousel-inner">

                            @foreach ($produtoDestaque as $index => $grupo)
                                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                                    <div class="row p-3 row-cols-1 row-cols-md-3 row-cols-lg-4 g-4 justify-content-center">
                                        @foreach ($grupo as $item)
                                            <x-produto.produto-card :produto="$item" />
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach

                        </div>


                        <button class="carousel-control-prev shadow" type="button" data-bs-target="#carrosselMultiplosCards"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Anterior</span>
                        </button>

                        <button class="carousel-control-next shadow" type="button" data-bs-target="#carrosselMultiplosCards"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Próximo</span>
                        </button>
                    </div>
                </div>
            @endif

            <div class="shadow rounded-3 py-3 my-3 caixa produto">
                <div class="row p-3 row-cols-1 row-cols-md-3 row-cols-lg-4 g-4 justify-content-center">
                    @foreach ($produto as $item)
                        <x-produto.produto-card :produto="$item" />
                    @endforeach
                </div>
            </div>

        @endif



        @if (count($produto) == 0 && $busca)
            <div class="alert alert-warning mt-5" role="alert">
                Nenhum produto encontrado para "{{ $busca }}". <a href="{{ route('home.index') }}"
                    class="alert-link">Ver todos os produtos</a>.
            </div>
        @elseif (count($produto) === 0)
            <div class="alert alert-info  mt-5" role="alert">
                Nenhum produto cadastrado.
            </div>
        @endif
    </div>


@endsection
