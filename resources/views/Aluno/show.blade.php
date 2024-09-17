@extends('layout')
@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Minhas Medidas</h6>
        </div>
        <div class="card-body">

            <div class="row" style="margin-top: 1rem;">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Medidas</h2>
                    </div>
                </div>
            </div>

            @if ($aluno)
                <table class="table table-bordered">
                    <tr>
                        <th>Peso</th>
                        <td>{{ $medidaCorporal->peso }} kg</td>
                    </tr>
                    <tr>
                        <th>Percentual de Gordura</th>
                        <td>{{ $medidaCorporal->gordura }} %</td>
                    </tr>
                    <tr>
                        <th>Cintura</th>
                        <td>{{ $medidaCorporal->cintura }} cm</td>
                    </tr>
                    <tr>
                        <th>Quadril</th>
                        <td>{{ $medidaCorporal->quadril }} cm</td>
                    </tr>
                    <tr>
                        <th>Peito</th>
                        <td>{{ $medidaCorporal->peito }} cm</td>
                    </tr>
                    <tr>
                        <th>Braço Direito</th>
                        <td>{{ $medidaCorporal->braco_direito }} cm</td>
                    </tr>
                    <tr>
                        <th>Braço Esquerdo</th>
                        <td>{{ $medidaCorporal->braco_esquerdo }} cm</td>
                    </tr>
                    <tr>
                        <th>Coxa Direita</th>
                        <td>{{ $medidaCorporal->coxa_direita }} cm</td>
                    </tr>
                    <tr>
                        <th>Coxa Esquerda</th>
                        <td>{{ $medidaCorporal->coxa_esquerda }} cm</td>
                    </tr>
                    <tr>
                        <th>Idade</th>
                        <td>{{ $aluno->idade }} anos</td>
                    </tr>
                </table>
            @else
                <p class="text-center">Você não tem dados ainda. Aguarde o instrutor preenche-los.</p>
            @endif
        </div>
    </div>
@endsection
