@extends('layouts.simples')
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/endereco/cadastraEndereco.css') }}">
@endpush
@push('script')
    @Vite('resources/js/cadastraEndereco.js')
@endpush

@section('title', 'atualizar endereço')
@section('conteudo')

<main class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-7">

                <div class="border-0 shadow-lg card">
                    <div class="py-3 text-center text-white card-header">
                        <h4 class="mb-0">Atualizar Endereço</h4>
                    </div>

                    <div class="p-4 card-body p-md-5">
                        <form method="POST" action="{{ route('endereco.update', ['enderecoId' => $endereco->id]) }}">
                            @csrf
                            @method('PUT')

                            @include('partials.form-endereco')
                            <div class="d-grid">
                                <button type="submit" class="btn btn-custom-address btn-lg">Atualizar Endereço</button>
                            </div>
                        </form>
                    </div>

                </div>

            </div>
        </div>
    </main>

@endsection
