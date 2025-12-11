document.addEventListener('DOMContentLoaded', function() {
    console.log("linkando");

    let tempo = 28800; // 8h em segundos
    const regressiva = document.getElementById('regressiva');

    if (!regressiva) {
        console.error("Elemento não encontrado!");
        return;
    }

    regressiva.textContent = formatarTempo(tempo);

    const intervalo = setInterval(() => {
        tempo--;
        regressiva.textContent = formatarTempo(tempo);

        if (tempo <= 0) {
            clearInterval(intervalo);
            regressiva.textContent = "Tempo esgotado!";
        }
    }, 1000);

    function formatarTempo(segundos) {
        const h = Math.floor(segundos / 3600);
        const m = Math.floor((segundos % 3600) / 60);
        const s = segundos % 60;

        return `${String(h).padStart(2, '0')}:${String(m).padStart(2, '0')}:${String(s).padStart(2, '0')}`;
    }

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

            Swal.fire({
                icon: data.status,
                title: data.message,
                timer: 2000,
                showConfirmButton: false
            });
        });
    }

});
