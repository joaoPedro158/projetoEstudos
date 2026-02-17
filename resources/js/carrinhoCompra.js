document.addEventListener('DOMContentLoaded', function() {
    console.log("linkando");
    const totalCarrinho = document.getElementById('totalCarrinho');

    function calcularTotal() {
        let total = 0;

        document.querySelectorAll('.card-item').forEach(item => {
            const checkbox =item.querySelector('.produto-check');
            const quantidadeDeInput = item.querySelector('.quantity-input');

            if (checkbox.checked) {
                const preco =parseFloat(checkbox.dataset.preco);
                const quantidade =parseInt(quantidadeDeInput.value);

                total += preco * quantidade;
                console.log(total);
            }
        })

        totalCarrinho.textContent = total.toLocaleString('pt-BR', {
            minimumFractionDigits: 2
        });
    }

    // Quando clicar no checkbox
    document.querySelectorAll('.produto-check').forEach(cb => {
        cb.addEventListener('change', calcularTotal);
    });

    // Quando mudar a quantidade
    document.querySelectorAll('.quantity-input').forEach(input => {
        input.addEventListener('input', calcularTotal);
    });

    // Calcula ao carregar a página
    calcularTotal();

});

