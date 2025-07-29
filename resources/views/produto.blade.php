@extends('layout.MainSimples')
@section('title', 'Produto')
@section('conteudo')

    <h1>Produtos cadastrados</h1>

    <ul>
        @foreach($produto as $item)
            <li>
                <strong>ID:</strong> {{ $item->id }} <br>
                <strong>Nome:</strong> {{ $item->nome }} <br>
                <strong>Preço:</strong> {{ $item->preco }} <br>
                <strong>Descrição:</strong> {{ $item->descricao }}
            </li>
            <hr>
        @endforeach
    </ul>


    <div class="container my-5">
    <h2 class="mb-4">Produtos em Destaque</h2>
    
    <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 g-4">
        {{-- Loop para cada produto --}}
        @foreach ($produto as $item)
            {{-- Chamando o componente e passando os dados do produto --}}
            <x-produto-card :produto="$item" />
        @endforeach
    </div>
</div>
@endsection
