@extends('layouts.simples')

@section('conteudo')
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="p-6 overflow-hidden text-center bg-white shadow-xl sm:rounded-lg">
                <div class="mb-4 text-yellow-500">
                    <svg class="w-12 h-12 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>

                <h2 class="mb-4 text-2xl font-bold text-yellow-600">Estamos aguardando seu pagamento!</h2>
                <p class="mb-2 text-gray-600">Seu pedido foi gerado com sucesso sob o ID: <strong>#{{ $pagamentoId }}</strong>.</p>
                <p class="mb-6 text-gray-600">Assim que o banco nos confirmar a compensação (Boleto pode levar até 48h), enviaremos um e-mail com a confirmação.</p>

                <div class="mt-6">
                    <a href="{{ route('Dashboard') }}" class="px-4 py-2 text-white transition bg-blue-500 rounded hover:bg-blue-600">
                        Ver Meus Pedidos
                    </a>
                </div>
            </div>
        </div>
    </div>

@endsection
