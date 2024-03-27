    <div class="container">
        <h1>Editar Dados do Aluno</h1>
        <form method="POST" action="{{ route('Aluno.update', $aluno->id) }}">
            @csrf
            @method('put') <!-- Use PUT para atualizar os dados -->

            <div class="mb-3">
                <label for="altura" class="form-label">Altura</label>
                <input type="text" class="form-control" id="altura" name="altura" value="{{ $aluno->altura }}"
                    required>
            </div>

            <div class="mb-3">
                <label for="peso" class="form-label">Peso</label>
                <input type="number" class="form-control" id="peso" name="peso" value="{{ $aluno->peso }}"
                    required>
            </div>

            <div class="mb-3">
                <select id="genero" name="genero" class="form-control mb-4" required title="Selecione seu gênero">
                    <option value=" {{ $aluno->sexo }}">Selecione o Gênero</option>
                    <option value="M">Masculino</option>
                    <option value="F">Feminino</option>s
                </select>
            </div>

            <div class="mb-3">
                <label for="gordura" class="form-label">Gordura</label>
                <input type="number" class="form-control" id="gordura" name="gordura" value="{{ $aluno->gordura }}">
            </div>

            <div class="mb-3">
                <label for="musculo" class="form-label">Massa Muscular</label>
                <input type="number" class="form-control" id="musculo" name="musculo" value="{{ $aluno->musculo }}">
            </div>

            <div class="mb-3">
                <label for="idade" class="form-label">Idade</label>
                <input type="number" class="form-control" id="idade" name="idade" value="{{ $aluno->idade }}"
                    required>
            </div>
            <button type="submit" class="btn btn-primary" >Salvar Alterações</button>
        </form>
    </div>
    
    