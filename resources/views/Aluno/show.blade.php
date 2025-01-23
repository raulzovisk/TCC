@extends('layout')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Minhas Medidas</h6>
        </div>
        <div class="card-body table-responsive">
            <div class="row" style="margin-top: 1rem;">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>{{ $aluno->user->name }}</h2>
                    </div>
                </div>
            </div>

            @if ($aluno && $medidaCorporal)
                <table class="table table-bordered text-center mb-4">
                    <thead>
                        <tr>
                            <th>Data da Medida Atual</th>
                            <th>Data da Última Medida</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ \Carbon\Carbon::parse($medidaCorporal->data_medida)->format('d/m/Y') }}</td>
                            <td>
                                @if ($ultimaMedida)
                                    {{ \Carbon\Carbon::parse($ultimaMedida['data_medida'])->format('d/m/Y') }}
                                @else
                                    <span class="text-muted">Sem dados anteriores</span>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                    <table class="table table-striped">
                        <tr>
                            <th>Idade</th>
                            <td>{{ $aluno->idade }} anos</td>
                            <td></td>
                        </tr>

                        <!-- Altura -->
                        <tr>
                            <th>Altura</th>
                            <td>{{ $medidaCorporal->altura }} cm</td>
                            @if ($ultimaMedida)
                                <td>
                                    @php
                                        $diferencaAltura = $medidaCorporal->altura - $ultimaMedida['altura'];
                                    @endphp
                                    <span class="{{ $diferencaAltura > 0 ? 'text-success' : 'text-danger' }}">
                                        {{ $diferencaAltura > 0 ? '+' : '' }}{{ $diferencaAltura }} cm
                                    </span>
                                </td>
                            @endif
                        </tr>

                        <!-- Peso -->
                        <tr>
                            <th>Peso</th>
                            <td>{{ $medidaCorporal->peso }} kg</td>
                            @if ($ultimaMedida)
                                <td>
                                    @php
                                        $diferencaPeso = $medidaCorporal->peso - $ultimaMedida['peso'];
                                    @endphp
                                    <span class="{{ $diferencaPeso > 0 ? 'text-success' : 'text-danger' }}">
                                        {{ $diferencaPeso > 0 ? '+' : '' }}{{ $diferencaPeso }} kg
                                    </span>
                                </td>
                            @endif
                        </tr>

                        <!-- Percentual de Gordura -->
                        <tr>
                            <th>Percentual de Gordura</th>
                            <td>{{ $medidaCorporal->gordura }} %</td>
                            @if ($ultimaMedida)
                                <td>
                                    @php
                                        $diferencaGordura = $medidaCorporal->gordura - $ultimaMedida['gordura'];
                                    @endphp
                                    <span class="{{ $diferencaGordura < 0 ? 'text-success' : 'text-danger' }}">
                                        {{ $diferencaGordura < 0 ? '' : '+' }}{{ $diferencaGordura }} %
                                    </span>
                                </td>
                            @endif
                        </tr>

                        <!-- Cintura -->
                        <tr>
                            <th>Cintura</th>
                            <td>{{ $medidaCorporal->cintura }} cm</td>
                            @if ($ultimaMedida)
                                <td>
                                    @php
                                        $diferencaCintura = $medidaCorporal->cintura - $ultimaMedida['cintura'];
                                    @endphp
                                    <span class="{{ $diferencaCintura < 0 ? 'text-success' : 'text-danger' }}">
                                        {{ $diferencaCintura < 0 ? '' : '+' }}{{ $diferencaCintura }} cm
                                    </span>
                                </td>
                            @endif
                        </tr>

                        <!-- Quadril -->
                        <tr>
                            <th>Quadril</th>
                            <td>{{ $medidaCorporal->quadril }} cm</td>
                            @if ($ultimaMedida)
                                <td>
                                    @php
                                        $diferencaQuadril = $medidaCorporal->quadril - $ultimaMedida['quadril'];
                                    @endphp
                                    <span class="{{ $diferencaQuadril < 0 ? 'text-success' : 'text-danger' }}">
                                        {{ $diferencaQuadril < 0 ? '' : '+' }}{{ $diferencaQuadril }} cm
                                    </span>
                                </td>
                            @endif
                        </tr>

                        <!-- Peito -->
                        <tr>
                            <th>Peito</th>
                            <td>{{ $medidaCorporal->peito }} cm</td>
                            @if ($ultimaMedida)
                                <td>
                                    @php
                                        $diferencaPeito = $medidaCorporal->peito - $ultimaMedida['peito'];
                                    @endphp
                                    <span class="{{ $diferencaPeito > 0 ? 'text-success' : 'text-danger' }}">
                                        {{ $diferencaPeito > 0 ? '+' : '' }}{{ $diferencaPeito }} cm
                                    </span>
                                </td>
                            @endif
                        </tr>

                        <!-- Braço Direito -->
                        <tr>
                            <th>Braço Direito</th>
                            <td>{{ $medidaCorporal->braco_direito }} cm</td>
                            @if ($ultimaMedida)
                                <td>
                                    @php
                                        $diferencaBracoDireito =
                                            $medidaCorporal->braco_direito - $ultimaMedida['braco_direito'];
                                    @endphp
                                    <span class="{{ $diferencaBracoDireito > 0 ? 'text-success' : 'text-danger' }}">
                                        {{ $diferencaBracoDireito > 0 ? '+' : '' }}{{ $diferencaBracoDireito }} cm
                                    </span>
                                </td>
                            @endif
                        </tr>

                        <!-- Braço Esquerdo -->
                        <tr>
                            <th>Braço Esquerdo</th>
                            <td>{{ $medidaCorporal->braco_esquerdo }} cm</td>
                            @if ($ultimaMedida)
                                <td>
                                    @php
                                        $diferencaBracoEsquerdo =
                                            $medidaCorporal->braco_esquerdo - $ultimaMedida['braco_esquerdo'];
                                    @endphp
                                    <span class="{{ $diferencaBracoEsquerdo > 0 ? 'text-success' : 'text-danger' }}">
                                        {{ $diferencaBracoEsquerdo > 0 ? '+' : '' }}{{ $diferencaBracoEsquerdo }} cm
                                    </span>
                                </td>
                            @endif
                        </tr>

                        <!-- Coxa Direita -->
                        <tr>
                            <th>Coxa Direita</th>
                            <td>{{ $medidaCorporal->coxa_direita }} cm</td>
                            @if ($ultimaMedida)
                                <td>
                                    @php
                                        $diferencaCoxaDireita =
                                            $medidaCorporal->coxa_direita - $ultimaMedida['coxa_direita'];
                                    @endphp
                                    <span class="{{ $diferencaCoxaDireita > 0 ? 'text-success' : 'text-danger' }}">
                                        {{ $diferencaCoxaDireita > 0 ? '+' : '' }}{{ $diferencaCoxaDireita }} cm
                                    </span>
                                </td>
                            @endif
                        </tr>

                        <!-- Coxa Esquerda -->
                        <tr>
                            <th>Coxa Esquerda</th>
                            <td>{{ $medidaCorporal->coxa_esquerda }} cm</td>
                            @if ($ultimaMedida)
                                <td>
                                    @php
                                        $diferencaCoxaEsquerda =
                                            $medidaCorporal->coxa_esquerda - $ultimaMedida['coxa_esquerda'];
                                    @endphp
                                    <span class="{{ $diferencaCoxaEsquerda > 0 ? 'text-success' : 'text-danger' }}">
                                        {{ $diferencaCoxaEsquerda > 0 ? '+' : '' }}{{ $diferencaCoxaEsquerda }} cm
                                    </span>
                                </td>
                            @endif
                        </tr>
                        <tr>
                            <th>IMC</th>
                            <td>
                                @php
                                    // Converte altura para metros
                                    $alturaMetros = $medidaCorporal->altura / 100;
                                    // Calcula o IMC
                                    $imc = $medidaCorporal->peso / ($alturaMetros * $alturaMetros);
                                @endphp
                                {{ number_format($imc, 2) }}
                            </td>
                            <td>
                                @php
                                    // Classificação do IMC
                                    if ($imc < 18.5) {
                                        $classificacao = 'Abaixo do peso';
                                    } elseif ($imc >= 18.5 && $imc < 24.9) {
                                        $classificacao = 'Peso normal';
                                    } elseif ($imc >= 25 && $imc < 29.9) {
                                        $classificacao = 'Sobrepeso';
                                    } else {
                                        $classificacao = 'Obesidade';
                                    }
                                @endphp
                                <span>{{ $classificacao }}</span>
                            </td>
                        </tr>
                    </table>
                @else
                    <p class="text-center">Você não tem dados ainda. Aguarde o instrutor preenche-los.</p>
            @endif
        </div>
    </div>
@endsection
