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

    atualizarInterface();
});
