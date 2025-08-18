@extends('layout.main')
@push('styles')

<link rel="stylesheet" href="{{ asset('css/produto-card.css') }}">
@endpush
@section('tittle', 'Home')
@section('conteudo')
    <div class="container my-5">
@if ($busca)
<h2>Buscando por: {{ $busca }}</h2>
@else
    <h2 class="mb-4">Produtos em Destaque</h2>

@endif



    <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 g-4">

        @foreach ($produto as $item)
            <x-produto-card :produto="$item" />
        @endforeach
    </div>
    @if (count($produto) == 0 && $busca)
        <div class="alert alert-warning mt-5" role="alert">
            Nenhum produto encontrado para "{{ $busca }}". <a href="{{ route('home.index') }}" class="alert-link">Ver todos os produtos</a>.
        </div>

    @elseif (count($produto) === 0)
        <div class="alert alert-info  mt-5" role="alert">
            Nenhum produto cadastrado.
        </div>
    @endif
</div>


@endsection
