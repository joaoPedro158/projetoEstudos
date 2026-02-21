document.addEventListener('DOMContentLoaded', function() {
    const precoBrutoDisplay = document.getElementById('precoBruto');
    const quantidadeDisplay = document.getElementById('quantidadeProdutos');
    const descontoDisplay = document.getElementById('precoDescontado');
    const totalFinalDisplay = document.getElementById('totalFinal');
    const tokenCSRF = document.querySelector('meta[name="csrf-token"]').content;



    function obterDadosMarcados() {
        const marcados = document.querySelectorAll('.js-check-produto:checked');
        let bruto = 0;
        let qtd = 0;
        let produtoIds = [];

        marcados.forEach(checkbox => {
            bruto += parseFloat(checkbox.getAttribute('data-preco')) || 0;
            qtd++;
            produtoIds.push(checkbox.getAttribute('data-id'));
        });
        return { bruto, qtd, produtoIds };
    }


    function calcularDesconto(valorBruto) {
        const taxaDesconto = 0.05;
        return valorBruto * taxaDesconto;
    }

    function atualizarInterface() {
        const { bruto, qtd} = obterDadosMarcados();
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

    document.addEventListener('click', function(event) {
    if(event.target.classList.contains('btn-excluir')) {
        event.preventDefault();
        const produtoContainer = event.target.closest('.produto-container');
        const produtoId = event.target.closest('[data-id]').dataset.id;


        excluirServidor(produtoId).then(sucesso => {
            if (sucesso) {
                produtoContainer.classList.add('animate__animated',
                    'animate__fadeOutLeft',
                    'animate__fast',
                    'item-excluindo');

                produtoContainer.addEventListener('animationend', () => {
                    produtoContainer.remove();
                    atualizarInterface();
                    verificarCarrinhoVazio();
                },{ once: true });
            }
        })
    }

    const btnCompraAgora = event.target.closest('#btnCompraAgora');
    if(btnCompraAgora) {
            event.preventDefault();
            const { produtoIds } = obterDadosMarcados();
            let produtoIdsJson = JSON.stringify({produto_id: produtoIds});


            if (produtoIds.length === 0) {
                alert('Selecione pelo menos um produto para prosseguir com a compra.');
                event.preventDefault();
            } else {
                checkoutItens(produtoIdsJson);
            }
        }
    });


    async function excluirServidor(produtoId) {
    try {
        const response = await fetch(`/carrinho/excluir/${produtoId}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN' : tokenCSRF,
                'Content-Type': 'application/json'
            }
        });
        return response.ok;
        } catch (error) {
            console.error('Erro ao excluir produto:', error);
            return false;
        }
    }

    async function checkoutItens(produtoIdsJson) {
        console.log('Enviando IDs dos produtos para o servidor:', produtoIdsJson);
        try {
            const response = await fetch('/checkout/adicionarItem', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN' : tokenCSRF,
                    'Content-Type': 'application/json'
                },
                    body: produtoIdsJson
            });
            if (response.ok) {
                window.location.href = '/endereco';
            } else {
                alert('Erro ao processar checkout. Tente novamente.');
            }
        } catch (error) {
            console.error('Erro ao adicionar itens para checkout:', error);
            return false;
        }
    }

    function verificarCarrinhoVazio() {
        const lista = document.getElementById('lista-produto');
        const itens = lista.querySelectorAll('.produto-container');

        if(itens.length === 0) {
        const templateVazio = document.getElementById('template-carrinho-vazio');
        const templateClone = templateVazio.content.cloneNode(true);

        lista.innerHTML = '';
        lista.appendChild(templateClone);

        }
    }



 atualizarInterface();
});






