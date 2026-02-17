document.addEventListener('DOMContentLoaded', function() {


    const produtosJson = JSON.parse(document.getElementById('produtosEloquet').dataset.produtos);
    console.log(produtosJson);

    function precoProdutos(produtos) {
        let total = 0;
        produtos.forEach(produto => {
            let valorNumerico = parseFloat(produto.preco)
            total += valorNumerico;
        });
        console.log(total);

        let totalformatado = new Intl.NumberFormat('pt-BR', {
            style: 'currency',
            currency: 'BRL'
        }).format(total);
        return totalformatado;
    }

    let total =precoProdutos(produtosJson);
    console.log(total);
});

