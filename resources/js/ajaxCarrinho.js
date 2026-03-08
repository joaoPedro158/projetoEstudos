document.addEventListener('DOMContentLoaded', function() {

    const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    document.addEventListener('click', function(event){
        const btnCarrinho = event.target.closest('.btn-carrinho');
        if(btnCarrinho) {
            event.preventDefault();
            event.stopPropagation();
            const produtoId = btnCarrinho.getAttribute('data-produto-id');
            adicionarAoCarrinho(produtoId);
        }
    })
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
