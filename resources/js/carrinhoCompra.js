document.addEventListener('DOMContentLoaded', function() {
    console.log("linkando");

    const produtosJson = JSON.parse(document.getElementById('produtosEloquet').dataset.produtos);
    console.log(produtosJson);

});

