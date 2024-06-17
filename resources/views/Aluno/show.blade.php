<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meus Dados</title>
    @include('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <x-app-layout>
        <div class="container-fluid mt-3">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card shadow mb-5 bg-white rounded">
                        <div class="card-body">
                            <h1 class="text-center mb-4 display-6">Meus Dados</h1>
                            <div class="p-4">
                                @if ($aluno)
                                    <p><strong>Altura:</strong> {{ $aluno->altura }} cm</p>
                                    <p><strong>Peso:</strong> {{ $aluno->peso }} kg</p>
                                    <p><strong>Gênero:</strong> {{ $aluno->genero }}</p>
                                    <p><strong>Percentual de Gordura:</strong> {{ $aluno->gordura }} %</p>
                                    <p><strong>Massa Muscular:</strong> {{ $aluno->musculo }} kg</p>
                                    <p><strong>Idade:</strong> {{ $aluno->idade }} anos</p>

                                    <h3 class="text-center mb-4 display-6">Comparação de Dados</h3>
                                    <canvas id="dataChart"></canvas>
                                    <script>
                                        document.addEventListener("DOMContentLoaded", function() {
                                            const historico = @json($historico);
                                            const currentData = @json($currentData);
                                            
                                            const labels = historico.map((entry, index) => `Histórico ${index + 1}`);
                                            labels.push('Atual');

                                            const alturaData = historico.map(entry => entry.altura);
                                            alturaData.push(currentData.altura);

                                            const pesoData = historico.map(entry => entry.peso);
                                            pesoData.push(currentData.peso);

                                            const gorduraData = historico.map(entry => entry.gordura);
                                            gorduraData.push(currentData.gordura);

                                            const musculoData = historico.map(entry => entry.musculo);
                                            musculoData.push(currentData.musculo);

                                            const idadeData = historico.map(entry => entry.idade);
                                            idadeData.push(currentData.idade);

                                            const ctx = document.getElementById('dataChart').getContext('2d');
                                            const chart = new Chart(ctx, {
                                                type: 'bar',
                                                data: {
                                                    labels: labels,
                                                    datasets: [
                                                        {
                                                            label: 'Altura (cm)',
                                                            data: alturaData,
                                                            backgroundColor: 'rgba(255, 99, 132, 0.2)',
                                                            borderColor: 'rgba(255, 99, 132, 1)',
                                                            borderWidth: 1
                                                        },
                                                        {
                                                            label: 'Peso (kg)',
                                                            data: pesoData,
                                                            backgroundColor: 'rgba(54, 162, 235, 0.2)',
                                                            borderColor: 'rgba(54, 162, 235, 1)',
                                                            borderWidth: 1
                                                        },
                                                        {
                                                            label: 'Gordura (%)',
                                                            data: gorduraData,
                                                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                                            borderColor: 'rgba(75, 192, 192, 1)',
                                                            borderWidth: 1
                                                        },
                                                        {
                                                            label: 'Músculo (kg)',
                                                            data: musculoData,
                                                            backgroundColor: 'rgba(153, 102, 255, 0.2)',
                                                            borderColor: 'rgba(153, 102, 255, 1)',
                                                            borderWidth: 1
                                                        },
                                                        {
                                                            label: 'Idade (anos)',
                                                            data: idadeData,
                                                            backgroundColor: 'rgba(255, 159, 64, 0.2)',
                                                            borderColor: 'rgba(255, 159, 64, 1)',
                                                            borderWidth: 1
                                                        }
                                                    ]
                                                },
                                                options: {
                                                    scales: {
                                                        y: {
                                                            beginAtZero: true
                                                        }
                                                    }
                                                }
                                            });
                                        });
                                    </script>
                                @else
                                    <p class="text-center">Você não tem dados ainda. Aguarde o instrutor preenche-los.</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>

    @if (session('success'))
        <div class="alert alert-success w-25 position-fixed bottom-0 end-0 m-3" role="alert" id="success-alert">
            {{ session('success') }}
        </div>
    @endif

    <script>
        $(document).ready(function() {
            $("#success-alert").fadeTo(2000, 500).slideUp(500, function() {
                $("#success-alert").slideUp(500);
            });
        });
    </script>
</body>

</html>
