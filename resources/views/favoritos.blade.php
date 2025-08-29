@extends('layouts.MainSimples')
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/favoritos.css') }}">
@endpush
@section('title', 'favoritos')
@section('conteudo')
    <main class="container my-5">
        <div class="d-flex align-items-center mb-4">
            <i class="bi bi-heart-fill me-3 icone"></i>
            <h1 class="h2 mb-0" style="color: var(--cor-texto-primario);">Minha Lista de Desejos</h1>
        </div>

        <!-- Grid de Produtos -->
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
            @if (count($favoritos) > 0)

                @foreach ($favoritos as $item)
                    <x-favoritos.favoritos-card :favoritos="$item" />
                @endforeach
            @else
                <div >
                    <div class="alert alert-info text-center mt-3" role="alert">
                        Você não adicionou nenhum produto aos favoritos.
                    </div>
                </div>
            @endif
    </main>

@endsection
