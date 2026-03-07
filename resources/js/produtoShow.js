document.addEventListener('DOMContentLoaded', function() {

    let tempo = 28800;
    const tokenCSRF = document.querySelector('meta[name="csrf-token"]').content;
    const btnComprar = document.getElementById('btnComprar');

    if (btnComprar) {
        btnComprar.addEventListener('click', function(event) {
            const produtoId = this.dataset.produtoId;
            const precoElement = document.querySelector('[data-precounitario]');
            const precoUnitario = precoElement.dataset.precounitario;

            const produtoDados = {
                "produto_id": [
                    {
                        "id": produtoId,
                        "quantidade": 1,
                        "precoUnitario": precoUnitario
                    }
                ]
            };
            let produtoJson = JSON.stringify(produtoDados);
            console.log("Dados do produto para checkout:", produtoJson);
            checkoutItens(produtoJson);
        });
    }

    async function checkoutItens(produtoIdsJson) {
        try {
            const response = await fetch('/checkout/adicionarItem', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': tokenCSRF,
                    'Content-Type': 'application/json'
                },

                body: produtoIdsJson
            });

            if (response.ok) {
                window.location.href = '/endereco';
            } else {
                const erroTexto = await response.text();
                console.error('Erro do servidor:', erroTexto);
                alert('Erro ao processar checkout. Verifique os dados.');
            }
        } catch (error) {
            console.error('Erro na requisição:', error);
        }
    }


    const regressiva = document.getElementById('regressiva');
    if (regressiva) {
        regressiva.textContent = formatarTempo(tempo);
        const intervalo = setInterval(() => {
            tempo--;
            regressiva.textContent = formatarTempo(tempo);
            if (tempo <= 0) {
                clearInterval(intervalo);
                regressiva.textContent = "Tempo esgotado!";
            }
        }, 1000);
    }

    function formatarTempo(segundos) {
        const h = Math.floor(segundos / 3600);
        const m = Math.floor((segundos % 3600) / 60);
        const s = segundos % 60;
        return `${String(h).padStart(2, '0')}:${String(m).padStart(2, '0')}:${String(s).padStart(2, '0')}`;
    }
});
