@extends('layout')
@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Editanto Dados</h6>
        </div>
        <div class="card-body">

            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Editando Dados</h2>
                    </div>
                </div>
            </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="POST" action="{{ route('Aluno.update', $aluno->id) }}" id="alunoForm">
                @csrf
                @method('PUT')

                @php
                    // Recupera a última medida corporal do aluno
                    $ultimaMedida = $aluno->medidasCorporais->last();
                @endphp

                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Altura:</strong>
                            <input type="text" class="form-control" id="altura" name="altura"
                                value="{{ $ultimaMedida->altura ?? '' }}" required oninput="validateNumberInput(this)">
                        </div>
                    </div>

                    <div class="form-row col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group col-md-6">
                            <strong>Peso:</strong>
                            <input type="text" class="form-control" id="peso" name="peso"
                                value="{{ $ultimaMedida->peso ?? '' }}" required oninput="validateNumberInput(this)">
                        </div>


                        <div class="form-group col-md-6">
                            <strong>Gordura: </strong>
                            <input type="text" class="form-control" id="gordura" name="gordura"
                                value="{{ $ultimaMedida->gordura ?? '' }}" oninput="validateNumberInput(this)">
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group  ">
                            <strong>Peito: </strong>
                            <input type="text" class="form-control " id="peito" name="peito"
                                value="{{ $ultimaMedida->peito ?? '' }}" required oninput="validateIntegerInput(this)">
                        </div>
                    </div>

                    <div class="form-row col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group col-md-6">
                            <strong>Cintura: </strong>
                            <input type="text" class="form-control" id="cintura" name="cintura"
                                value="{{ $ultimaMedida->cintura ?? '' }}" required oninput="validateIntegerInput(this)">
                        </div>

                        <div class="form-group col-md-6">
                            <strong>Quadril: </strong>
                            <input type="text" class="form-control" id="quadril" name="quadril"
                                value="{{ $ultimaMedida->quadril ?? '' }}" required oninput="validateIntegerInput(this)">
                        </div>
                    </div>


                    <div class="form-row col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group col-md-6">
                            <strong>Braço Direito: </strong>
                            <input type="text" class="form-control" id="braco_direito" name="braco_direito"
                                value="{{ $ultimaMedida->braco_direito ?? '' }}" required
                                oninput="validateIntegerInput(this)">
                        </div>
                        <div class="form-group col-md-6">
                            <strong>Braço Esquedo</strong>
                            <input type="text" class="form-control" id="braco_esquerdo" name="braco_esquerdo"
                                value="{{ $ultimaMedida->braco_esquerdo ?? '' }}" required
                                oninput="validateIntegerInput(this)">
                        </div>
                    </div>

                    <div class="form-row col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group col-md-6">
                            <strong>Perna Direita: </strong>
                            <input type="text" class="form-control" id="coxa_direita" name="coxa_direita"
                                value="{{ $ultimaMedida->coxa_direita ?? '' }}" required
                                oninput="validateIntegerInput(this)">
                        </div>
                        <div class="form-group col-md-6">
                            <strong>Perna Esquerda</strong>
                            <input type="text" class="form-control" id="coxa_esquerda" name="coxa_esquerda"
                                value="{{ $ultimaMedida->coxa_esquerda ?? '' }}" required
                                oninput="validateIntegerInput(this)">
                        </div>
                    </div>
                </div>
                <div>
                    <button class="btn btn-primary">Salvar</button>
                    <button onclick="history.back()" class="btn btn-secondary">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
    <script>
        function validateNumberInput(input) {
            let value = input.value;
            value = value.replace(/[^0-9,.]/g, '');
            value = value.replace(',', '.');
            if ((value.match(/\./g) || []).length > 1) {
                value = value.replace(/\.(?=.*\.)/, '');
            }
            input.value = value;
        }

        function validateIntegerInput(input) {
            let value = input.value;
            input.value = value.replace(/[^0-9]/g, '');
        }
    </script>
@endsection
