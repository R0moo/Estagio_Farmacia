<x-app-layout>
<div class="py-12">
    <div class="w-1/2 mx-auto sm:px-6 lg:px-8">
        <div class="overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">

                <!-- Seção CC -->
                <div class="mb-10">
                    <div class="card-body">
                        <h2 class="font-bold text-xl">Confiança e Credibilidade</h2> <br>
                        <div class="row flex flex-wrap justify-center">
                            
                            @foreach($detalhes['cc'] as $index => $pergunta)
                            <div class="w-full md:w-1/2 lg:w-1/2 p-2">
                                <div class="card h-full">
                                    <div class="card-body flex flex-col m-5">
                                        <h5 class="card-title">Pergunta {{ $index+1 }}</h5>
                                        <p class="text-muted">{{ $pergunta['pergunta'] }}</p>
                                        <div class="chart-container flex-grow" style="position: relative; height: 300px;">
                                            <canvas id="ccChart{{ $index }}"></canvas>
                                        </div>
                                        <div class="mt-2 text-center">
                                            <small class="text-muted">
                                                Média: <strong>{{ $pergunta['media'] }}</strong> |
                                                Avaliações: {{ $totalAvaliacoes }}
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="card mb-10">
                    <div class="card-body">
                        <h2 class="font-bold text-xl">Relacionamento Interpessoal e Comunicação com os Instrutores</h2> <br>
                        <div class="row flex flex-wrap justify-center">
                            @foreach($detalhes['rc'] as $index => $pergunta)
                            <div class="w-full md:w-1/2 lg:w-1/2 p-2">
                                <div class="card h-full">
                                    <div class="card-body flex flex-col m-5">
                                        <h5 class="card-title">Pergunta {{ $index+1 }}</h5>
                                        <p class="text-muted">{{ $pergunta['pergunta'] }}</p>
                                        <div class="chart-container flex-grow" style="position: relative; height: 300px;">
                                            <canvas id="rcChart{{ $index }}"></canvas>
                                        </div>
                                        <div class="mt-2 text-center">
                                            <small class="text-muted">
                                                Média: <strong>{{ $pergunta['media'] }}</strong> |
                                                Avaliações: {{ $totalAvaliacoes }}
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Seção AG -->
                <div class="card mb-10">

                    <div class="card-body">
                        <h2 class="font-bold text-xl">Avaliação Geral do Curso</h2>
                        <div class="row flex flex-wrap justify-center">
                            @foreach($detalhes['ag'] as $index => $pergunta)
                            <div class="w-full md:w-1/2 lg:w-1/2 p-2">
                                <div class="card h-full">
                                    <div class="card-body flex flex-col m-5">
                                        <h5 class="card-title">Pergunta {{ $index+1 }}</h5>
                                        <p class="text-muted">{{ $pergunta['pergunta'] }}</p>
                                        <div class="chart-container flex-grow" style="position: relative; height: 300px;">
                                            <canvas id="agChart{{ $index }}"></canvas>
                                        </div>
                                        <div class="mt-2 text-center">
                                            <small class="text-muted">
                                                Média: <strong>{{ $pergunta['media'] }}</strong> |
                                                Avaliações: {{ $totalAvaliacoes }}
                                            </small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@push('styles')
<style>
    .chart-container {
        width: 100%;
        min-height: 300px;
    }
    .card {
        height: 100%;
        display: flex;
        flex-direction: column;
    }
    .card-body {
        flex: 1;
    }
    @media (max-width: 768px) {
        .w-1\/2 {
            width: 100% !important;
        }
    }
</style>
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Configuração comum para os gráficos de pizza
    const chartOptions = {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                position: 'right',
                labels: {
                    boxWidth: 12,
                    padding: 15,
                    font: {
                        size: 12
                    }
                }
            },
            tooltip: {
                callbacks: {
                    label: function(context) {
                        const label = context.label || '';
                        const value = context.raw || 0;
                        const total = context.dataset.data.reduce((a, b) => a + b, 0);
                        const percentage = Math.round((value / total) * 100);
                        return `${label}: ${value} (${percentage}%)`;
                    }
                }
            }
        }
    };

    // Cores para os gráficos
    const backgroundColors = [
        'rgba(255, 99, 132, 0.7)',    // Vermelho
        'rgba(54, 162, 235, 0.7)',     // Azul
        'rgba(255, 206, 86, 0.7)',     // Amarelo
        'rgba(75, 192, 192, 0.7)',     // Verde-água
        'rgba(153, 102, 255, 0.7)'     // Roxo
    ];

    // Gerar gráficos de pizza para CC
    @foreach($detalhes['cc'] as $index => $pergunta)
    try {
        new Chart(document.getElementById('ccChart{{ $index }}'), {
            type: 'pie',
            data: {
                labels: ['Discordo Totalmente', 'Discordo', 'Neutro', 'Concordo', 'Concordo Totalmente'],
                datasets: [{
                    data: [
                        {{ $pergunta['distribuicao'][1] ?? 0 }},
                        {{ $pergunta['distribuicao'][2] ?? 0 }},
                        {{ $pergunta['distribuicao'][3] ?? 0 }},
                        {{ $pergunta['distribuicao'][4] ?? 0 }},
                        {{ $pergunta['distribuicao'][5] ?? 0 }}
                    ],
                    backgroundColor: backgroundColors,
                    borderWidth: 1
                }]
            },
            options: chartOptions
        });
    } catch (e) {
        console.error('Erro ao criar gráfico ccChart{{ $index }}:', e);
    }
    @endforeach

    // Gerar gráficos de pizza para RC
    @foreach($detalhes['rc'] as $index => $pergunta)
    try {
        new Chart(document.getElementById('rcChart{{ $index }}'), {
            type: 'pie',
            data: {
                labels: ['Discordo Totalmente', 'Discordo', 'Neutro', 'Concordo', 'Concordo Totalmente'],
                datasets: [{
                    data: [
                        {{ $pergunta['distribuicao'][1] ?? 0 }},
                        {{ $pergunta['distribuicao'][2] ?? 0 }},
                        {{ $pergunta['distribuicao'][3] ?? 0 }},
                        {{ $pergunta['distribuicao'][4] ?? 0 }},
                        {{ $pergunta['distribuicao'][5] ?? 0 }}
                    ],
                    backgroundColor: backgroundColors,
                    borderWidth: 1
                }]
            },
            options: chartOptions
        });
    } catch (e) {
        console.error('Erro ao criar gráfico rcChart{{ $index }}:', e);
    }
    @endforeach

    // Gerar gráficos de pizza para AG
    @foreach($detalhes['ag'] as $index => $pergunta)
    try {
        new Chart(document.getElementById('agChart{{ $index }}'), {
            type: 'pie',
            data: {
                labels: ['Discordo Totalmente', 'Discordo', 'Neutro', 'Concordo', 'Concordo Totalmente'],
                datasets: [{
                    data: [
                        {{ $pergunta['distribuicao'][1] ?? 0 }},
                        {{ $pergunta['distribuicao'][2] ?? 0 }},
                        {{ $pergunta['distribuicao'][3] ?? 0 }},
                        {{ $pergunta['distribuicao'][4] ?? 0 }},
                        {{ $pergunta['distribuicao'][5] ?? 0 }}
                    ],
                    backgroundColor: backgroundColors,
                    borderWidth: 1
                }]
            },
            options: chartOptions
        });
    } catch (e) {
        console.error('Erro ao criar gráfico agChart{{ $index }}:', e);
    }
    @endforeach
});
</script>
@endpush
</x-app-layout>