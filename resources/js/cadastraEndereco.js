document.addEventListener('DOMContentLoaded', function() {
    const cepInput = document.getElementById('cep');

    cepInput.addEventListener('blur', function() {
        let cep = cepInput.value.replace(/\D/g, ''); // Remove non-digit characters

        if (cep.length === 8) {
            const campos = ['logradouro', 'bairro', 'cidade', 'estado'];
            campos.forEach(id => document.getElementById(id).value = '.....');

            fetch(`https://viacep.com.br/ws/${cep}/json/`)
                .then(response => response.json())
                .then(dados => {
                    if (!dados.erro) {
                        document.getElementById('logradouro').value = dados.logradouro;
                        document.getElementById('bairro').value = dados.bairro;
                        document.getElementById('cidade').value = dados.localidade;
                        document.getElementById('estado').value = dados.uf;
                        document.getElementById('numero').focus();
                    } else {
                        alert("CEP não encontrado.");
                        campos.forEach(id => document.getElementById(id).value = '');
                    }
                })
                .catch(error => {
                    console.error("Erro ao buscar CEP:", error);
                    alert("Erro ao buscar CEP. Tente novamente.");
                });
        }
    });
});
