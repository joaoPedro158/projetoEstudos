document.addEventListener('DOMContentLoaded', function() {
    const btnIrPagamento = document.getElementById('btnIrPagamento');
    const tokenCSRF = document.querySelector('meta[name="csrf-token"]').content;


    function obterEndereco() {
        const radioSelecionado = document.querySelector('input[name="endereco_id"]:checked');

        if (radioSelecionado) {
            return radioSelecionado.value;
        }
        return null;
    }
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

});
