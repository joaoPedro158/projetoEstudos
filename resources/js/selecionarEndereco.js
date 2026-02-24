document.addEventListener('DOMContentLoaded', function() {
    const btnIrPagamento = document.getElementById('btnCompraAgora');
    const tokenCSRF = document.querySelector('meta[name="csrf-token"]').content;
    const btnEditEndereco = document.getElementById('btnEditEndereco');
    const quantidadeDisplay = document.getElementById('quantidadeProdutos');
    const valorTotalDisplay = document.getElementById('totalFinal');
    const precoBrutoDisplay = document.getElementById('precoBruto');



    function obterEndereco() {
        const radioSelecionado = document.querySelector('input[name="endereco_id"]:checked');

        if (radioSelecionado) {
            return radioSelecionado.value;
        }
        return null;
    }
    function atualizarInterface() {
        const formatador = new Intl.NumberFormat('pt-BR', { style: 'currency', currency: 'BRL' });

        quantidadeDisplay.textContent = dadosCheckout.quantidadeTotal;
        valorTotalDisplay.textContent = formatador.format(dadosCheckout.totalGeral);
        precoBrutoDisplay.textContent = formatador.format(dadosCheckout.totalGeral);

    }

    btnEditEndereco.addEventListener('click', function() {
        let enderecoId = obterEndereco();
        if(!enderecoId) {
            alert('selecione um endereço para atualizar');
            return;
        }
        console.log(enderecoId);
        window.location.href = `/endereco/edit/${enderecoId}`;
    })
    btnIrPagamento.addEventListener('click', function(event) {
        let enderecoId = obterEndereco();
        event.preventDefault();
        if(!enderecoId) {
            alert('Por favor, selecione um endereço para prosseguir.');
            return;
        }
        console.log('Endereço selecionado:', enderecoId);
        enviarServidor(enderecoId);
    })


    async function enviarServidor(enderecoId) {
        try {
            const response = await fetch(`/checkout/adicionarEndereco/${enderecoId}`, {
                    method: 'POST',
                    headers: {
                    'X-CSRF-TOKEN' : tokenCSRF,
                    'Content-Type': 'application/json'
                }
            });
            if(response.ok) {
                window.location.href = '/pagamento';
            }
        } catch (error) {
            console.error('Erro ao enviar endereço para o servidor:', error);
            return false;
        }
    }
    atualizarInterface();
});
