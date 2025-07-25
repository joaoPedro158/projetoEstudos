@extends('layout.main')
@section('tittle', 'Home')
@section('conteudo')
        <h3>Idade: {{$idade}}</h3>
        <hr>
        <ul>
            @foreach($habilidades as $habilidades)
                <li>{{$habilidades}}</li>
            @endforeach
        </ul>

@endsection
        