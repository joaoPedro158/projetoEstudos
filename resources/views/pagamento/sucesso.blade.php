@extends('layouts.simples')

@section('conteudo')
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="p-6 overflow-hidden text-center bg-white shadow-xl sm:rounded-lg">
                <h2 class="mb-4 text-2xl font-bold text-green-600">Pagamento Confirmado!</h2>
                <p class="mb-2">Obrigado pela sua compra.</p>
                <p class="text-sm text-gray-600">ID da Transação: {{ $dadosMP['pagamento_id'] }}</p>
                <p class="text-sm text-gray-600">Referência do Endereço: {{ $dadosMP['referencia'] }}</p>

                <div class="mt-6">
                    <a href="{{ route('Dashboard') }}" class="px-4 py-2 text-white bg-blue-500 rounded">
                        Voltar para a Loja
                    </a>
                </div>
            </div>
        </div>
    </div>

@endsection
