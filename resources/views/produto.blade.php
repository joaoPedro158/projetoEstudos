@extends('layout.main')
@section('tittle', 'Produto')
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
@endsection
