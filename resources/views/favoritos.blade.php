@extends('layouts.simples')
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/favoritos.css') }}">
@endpush
@section('title', 'favoritos')
@section('conteudo')
    <main class="container my-5">
        <div class="mb-4 d-flex align-items-center">
            <i class="bi bi-heart-fill me-3 icone"></i>
            <h1 class="mb-0 h2" style="color: var(--cor-texto-primario);">Minha Lista de Desejos</h1>
        </div>

        <!-- Grid de Produtos -->
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
            @if (count($favoritos) > 0)

                @foreach ($favoritos as $item)
                    <x-favoritos.favoritos-card :favoritos="$item" />
                @endforeach
            @else
                <div >
                    <div class="mt-3 text-center alert alert-info" role="alert">
                        Você não adicionou nenhum produto aos favoritos.
                    </div>
                </div>
            @endif
    </main>

@endsection
