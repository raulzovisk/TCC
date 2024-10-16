@extends('layout')
@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Cadastrar Aluno: {{ $user->name }}</h6>
        </div>

        <div class="card-body">

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

            <form id="alunoForm" action="{{ route('Aluno.store') }}" method="POST" class="was-validated">
                @csrf

                <input type="hidden" name="id_user" value="{{ $user->id }}">

                <div class="row">
                    <div class="form-row col-xs-12 col-sm-12 col-md-12">

                        <div class="form-group col-md-4">
                            <strong>Idade:</strong>
                            <input type="text" class="form-control" id="idade" name="idade" placeholder="Idade"
                                required>
                        </div>
                        <div class="form-group col-md-4">
                            <strong>Genero:</strong>
                            <select id="genero" name="genero" class="form-control is-valid rounded mb-2" required>
                                <option value="" disabled selected>Selecione o gênero</option>
                                <option value="M">Masculino</option>
                                <option value="F">Feminino</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <strong>Altura:</strong>
                            <input type="text" class="form-control" id="altura" name="altura"
                                placeholder="Altura (cm)" required oninput="validateIntegerInput(this)">
                        </div>
                    </div>

                    <div class="form-row col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group col-md-6">
                            <strong>Peso:</strong>
                            <input type="text" class="form-control" id="peso" name="peso" placeholder="Peso (KG)"
                                required oninput="validateNumberInput(this)">
                        </div>

                        <div class="form-group col-md-6">
                            <strong>Gordura:</strong>
                            <input type="text" class="form-control" id="gordura" name="gordura" placeholder="% Gordura"
                                required oninput="validateNumberInput(this)">
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Peito:</strong>
                            <input type="text" class="form-control" id="peito" name="peito"
                                placeholder="Peito (cm)" required oninput="validateIntegerInput(this)">
                        </div>
                    </div>

                    <div class="form-row col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group col-md-6">
                            <strong>Cintura:</strong>
                            <input type="text" class="form-control" id="cintura" name="cintura"
                                placeholder="Cintura (cm)" required oninput="validateIntegerInput(this)">
                        </div>

                        <div class="form-group col-md-6">
                            <strong>Quadril:</strong>
                            <input type="text" class="form-control" id="quadril" name="quadril"
                                placeholder="Quadril (cm)" required oninput="validateIntegerInput(this)">
                        </div>
                    </div>

                    <div class="form-row col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group col-md-6">
                            <strong>Braço Direito:</strong>
                            <input type="text" class="form-control" id="braco_direito" name="braco_direito"
                                placeholder="Braço Direito (cm)" required oninput="validateIntegerInput(this)">
                        </div>

                        <div class="form-group col-md-6">
                            <strong>Braço Esquerdo:</strong>
                            <input type="text" class="form-control" id="braco_esquerdo" name="braco_esquerdo"
                                placeholder="Braço Esquerdo (cm)" required oninput="validateIntegerInput(this)">
                        </div>
                    </div>

                    <div class="form-row col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group col-md-6">
                            <strong>Perna Direita:</strong>
                            <input type="text" class="form-control" id="coxa_direita" name="coxa_direita"
                                placeholder="Coxa Direita (cm)" required oninput="validateIntegerInput(this)">
                        </div>

                        <div class="form-group col-md-6">
                            <strong>Perna Esquerda:</strong>
                            <input type="text" class="form-control" id="coxa_esquerda" name="coxa_esquerda"
                                placeholder="Coxa Esquerda (cm)" required oninput="validateIntegerInput(this)">
                        </div>
                    </div>

                </div>
                <div>
                    <button class="btn btn-primary">Cadastrar</button>
                    <button onclick="history.back()" class="btn btn-secondary ">Cancelar</button>
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
