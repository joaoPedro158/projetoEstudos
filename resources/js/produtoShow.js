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

        const hh = String(h).padStart(2, '0');
        const mm = String(m).padStart(2, '0');
        const ss = String(s).padStart(2, '0');

        return `${hh}:${mm}:${ss}`;
    }

    const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    

fetch("/teste-ajax", {
    method: "POST",
    headers: {
        "Content-Type": "application/json",
        "X-CSRF-TOKEN": token
    },
    body: JSON.stringify({

    })
})
.then(response => response.json())
.then(data => {
    console.log("Resposta do servidor:", data);
})
.catch(error => console.error("Erro na requisição:", error));

});
