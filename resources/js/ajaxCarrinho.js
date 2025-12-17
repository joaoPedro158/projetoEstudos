document.addEventListener('DOMContentLoaded', function() {
    console.log("linkando");

    // AJAX carrinho
    const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    const btnCarrinho = document.getElementById('btnCarrinho');

    if (btnCarrinho) {
        btnCarrinho.addEventListener('click', function() {
            const produtoId = this.dataset.produtoId;
            adicionarAoCarrinho(produtoId);
        });
    }

    function adicionarAoCarrinho(produtoId) {
        fetch('/carrinho-ajax', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': token,
                'Accept': 'application/json'
            },
            body: JSON.stringify({
                produto_id: produtoId
            })
        })
       .then(response => {
        if(response.status === 401) {
            window.location.href = '/login';
            return;
        }
        return response.json();
       })
        .then(data => {

           showToast(data.status, data.message);

        });
    }

});
