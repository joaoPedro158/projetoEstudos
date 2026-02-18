document.addEventListener('DOMContentLoaded', function() {

    const precoPrdutos = document.getElementById('precoProdutos');
    const quantidadeProdutos = document.getElementById('quantidadeProdutos');

    function calcularTotal() {
        let total = 0;
        let quantidade = 0;
        const checkBoxMarcados = document.querySelectorAll('.js-check-produto:checked');

        checkBoxMarcados.forEach(checkbox => {
            let preco = parseFloat(checkbox.getAttribute('data-preco')) || 0;
            quantidade++;
            total += preco;
        })
        console.log(quantidade);
        let totalformatado = new Intl.NumberFormat('pt-BR', {
            style: 'currency',
            currency: 'BRL'
        }).format(total);
        precoPrdutos.textContent = totalformatado;
        quantidadeProdutos.textContent = quantidade;

    }

        document.querySelectorAll('.js-check-produto').forEach(checkbox => {
            checkbox.addEventListener('change', calcularTotal);
        });

    calcularTotal();


});

