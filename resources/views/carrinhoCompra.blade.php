@extends('layout.MainSimples')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/cores.css') }}">
<link rel="stylesheet" href="{{ asset('carrinhoCompra/cores.css') }}">
@endpush
@section('title', 'carinho de compras')
@section('conteudo')

  <div class="container mt-4 " >
    <div>
        @foreach ($carinhoCompra as $item)
            <x-carinho-card :produto="$item" />
          @endforeach
    </div>
  </div>

@endsection

