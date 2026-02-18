document.addEventListener('DOMContentLoaded', function() {

    const precoPrdutos = document.getElementById('precoProdutos');


    function calcularTotal() {
        let total = 0;
        const checkBoxMarcados = document.querySelectorAll('.form-check-input:checked');

        checkBoxMarcados.forEach(checkbox => {
            let preco = parseFloat(checkbox.getAttribute('data-preco')) || 0;
            total += preco;
        })

        let totalformatado = new Intl.NumberFormat('pt-BR', {
            style: 'currency',
            currency: 'BRL'
        }).format(total);

        precoPrdutos.textContent = totalformatado;
        document.querySelectorAll('.form-check-input').forEach(checkbox => {
            checkbox.addEventListener('change', calcularTotal);
        });

        return totalformatado;
    }


    calcularTotal();


});

