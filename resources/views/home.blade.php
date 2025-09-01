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

            <div class="shadow rounded-3 py-3 my-3 caixa produto">

                <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 g-4 justify-content-around">

                    @foreach ($produto as $item)
                        <x-produto.produto-card :produto="$item" />
                    @endforeach
                </div>
            </div>
                <div class="container my-5 p- shadow rounded-3 ">
                    <div id="carrosselMultiplosCards" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <div class="card">
                                            <img src="https://via.placeholder.com/300x200?text=Card+1" class="card-img-top"
                                                alt="...">
                                            <div class="card-body">
                                                <h5 class="card-title">Card 1</h5>
                                                <p class="card-text">Texto do primeiro card.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <div class="card">
                                            <img src="https://via.placeholder.com/300x200?text=Card+2" class="card-img-top"
                                                alt="...">
                                            <div class="card-body">
                                                <h5 class="card-title">Card 2</h5>
                                                <p class="card-text">Texto do segundo card.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <div class="card">
                                            <img src="https://via.placeholder.com/300x200?text=Card+3" class="card-img-top"
                                                alt="...">
                                            <div class="card-body">
                                                <h5 class="card-title">Card 3</h5>
                                                <p class="card-text">Texto do terceiro card.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="carousel-item">
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <div class="card">
                                            <img src="https://via.placeholder.com/300x200?text=Card+4" class="card-img-top"
                                                alt="...">
                                            <div class="card-body">
                                                <h5 class="card-title">Card 4</h5>
                                                <p class="card-text">Texto do quarto card.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <div class="card">
                                            <img src="https://via.placeholder.com/300x200?text=Card+5" class="card-img-top"
                                                alt="...">
                                            <div class="card-body">
                                                <h5 class="card-title">Card 5</h5>
                                                <p class="card-text">Texto do quinto card.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <div class="card">
                                            <img src="https://via.placeholder.com/300x200?text=Card+6" class="card-img-top"
                                                alt="...">
                                            <div class="card-body">
                                                <h5 class="card-title">Card 6</h5>
                                                <p class="card-text">Texto do sexto card.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button class="carousel-control-prev" type="button" data-bs-target="#carrosselMultiplosCards"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Anterior</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carrosselMultiplosCards"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Próximo</span>
                        </button>
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
