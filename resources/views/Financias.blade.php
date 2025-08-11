@extends('layout.MainSimples')

@section('title', 'Controle Financeiro')
@section('conteudo')

<canvas id="meuGrafico"></canvas>


<script>
    const ctx = document.getElementById('meuGrafico').getContext('2d');

    new Chart(ctx, {
        type: 'bar', // tipos: bar, line, pie, doughnut, radar, etc.
        data: {
            labels: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio'],
            datasets: [{
                label: 'Vendas',
                data: [12, 19, 3, 5, 2],
                backgroundColor: 'rgba(54, 162, 235, 0.5)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: { beginAtZero: true }
            }
        }
    });
</script>


@endsection
