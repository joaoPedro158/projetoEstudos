document.addEventListener('DOMContentLoaded', function() {
    const precoBrutoDisplay = document.getElementById('precoBruto');
    const quantidadeDisplay = document.getElementById('quantidadeProdutos');
    const descontoDisplay = document.getElementById('precoDescontado');
    const totalFinalDisplay = document.getElementById('totalFinal');

    function obterDadosMarcados() {
        const marcados = document.querySelectorAll('.js-check-produto:checked');
        let bruto = 0;
        let qtd = 0;

        marcados.forEach(checkbox => {
            bruto += parseFloat(checkbox.getAttribute('data-preco')) || 0;
            qtd++;
        });

        return { bruto, qtd };
    }


    function calcularDesconto(valorBruto) {
        const taxaDesconto = 0.05;
        return valorBruto * taxaDesconto;
    }

    function atualizarInterface() {
        const { bruto, qtd } = obterDadosMarcados();
        const desconto = calcularDesconto(bruto);
        const totalFinal = bruto - desconto;

        const formatador = new Intl.NumberFormat('pt-BR', { style: 'currency', currency: 'BRL' });


        precoBrutoDisplay.textContent = formatador.format(bruto);
        if (quantidadeDisplay) quantidadeDisplay.textContent = qtd;
        if (descontoDisplay) descontoDisplay.textContent = formatador.format(desconto);
        if (totalFinalDisplay) totalFinalDisplay.textContent = formatador.format(totalFinal);
    }

    document.querySelectorAll('.js-check-produto').forEach(cb => {
        cb.addEventListener('change', atualizarInterface);
    });

    document.addEventListener('click', function(event) {
    if(event.target.classList.contains('btn-excluir')) {
        event.preventDefault();
        const produtoContainer = event.target.closest('.produto-container');
        const produtoId = event.target.closest('[data-id]').dataset.id;


        excluirServidor(produtoId).then(sucesso => {
            if (sucesso) {
                produtoContainer.classList.add('animate__animated',
                    'animate__fadeOutLeft',
                    'animate__fast',
                    'item-excluindo');

                produtoContainer.addEventListener('animationend', () => {
                    produtoContainer.remove();
                    atualizarInterface();
                },{ once: true });
            }
        })
    }
});

    atualizarInterface();
});





async function excluirServidor(produtoId) {
    try {
        const response = await fetch(`/carrinho/excluir/${produtoId}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN' : document.querySelector('meta[name="csrf-token"]').content,
                'Content-Type': 'application/json'
            }
        });
        return response.ok;
    } catch (error) {
        console.error('Erro ao excluir produto:', error);
        return false;
    }
}
