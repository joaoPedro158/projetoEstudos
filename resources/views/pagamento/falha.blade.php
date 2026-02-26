@extends("layouts.simples")

@section('conteudo')
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="p-6 overflow-hidden text-center bg-white shadow-xl sm:rounded-lg">
                <div class="mb-4 text-red-500">
                    <svg class="w-12 h-12 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>

                <h2 class="mb-4 text-2xl font-bold text-red-600">Ops! O pagamento não foi processado.</h2>
                <p class="mb-6 text-gray-600">Não se preocupe, seus itens ainda estão no carrinho. Você pode tentar novamente com outro método de pagamento.</p>

                <div class="flex justify-center gap-4">
                    <a href="{{ route('checkout.index') }}" class="px-6 py-2 font-bold text-white transition bg-red-600 rounded-lg hover:bg-red-700">
                        Tentar Novamente
                    </a>

                    <a href="{{ route('Dashboard') }}" class="px-6 py-2 text-gray-500 hover:underline">
                        Voltar para a Loja
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
