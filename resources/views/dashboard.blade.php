    @extends('layout')
    @section('content')
        <div class="card-body">

            <div class="text-center">
                <h1 class=" mx-auto">Projeto Integrador - Raul Modesto Sousa <br> <strong style="color: #118FB9">GYN
                        WORKOUTS</strong></h1>

                @if (Auth::user() && !Auth::user()->aluno && !Auth::user()->instrutor && !Auth::user()->is_admin)
                    <p class="lead text-gray-800 mb-5">Este sistema tem como finalidade facilitar a visualização de fichas de
                        treino na academia de maneira simples e eficaz, além de possiur níveis de acesso em hierarquia para
                        melhor controle de funções sendo: <br>
                        <strong>Administrado > Instrutor > Aluno</strong>
                    </p>
                    <p>Parece que você ainda não possui nenhum dado, comunique com o profissional para que ele te cadastre.
                    </p>
                @endif

                @if (Auth::user() && Auth::user()->aluno)
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Acesso Rápido Aluno</h6>
                        </div>
                        <div class="bg-white py-2 px-3 collapse-inner rounded text-center">
                            <div class="d-flex flex-column align-items-center gap-3 mt-3">
                                <div class="position-relative mb-2">
                                    <a class="btn btn-outline-primary"
                                        href="{{ route('Aluno.show', Auth::user()->aluno->id) }}">Meus
                                        Dados</a>
                                    <i class="fas fa-info-circle text-muted ms-2" data-bs-toggle="tooltip"
                                        data-bs-placement="right" title="Visualize suas medidas"></i>
                                </div>
                                <div class="position-relative mb-2">
                                    <a class="btn btn-outline-primary" href="{{ route('Ficha.index') }}">Minhas
                                        Fichas</a>
                                    <i class="fas fa-info-circle text-muted ms-2" data-bs-toggle="tooltip"
                                        data-bs-placement="right" title="Exibe suas fichas "></i>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                @if ((Auth::user() && Auth::user()->instrutor) || (Auth::user() && Auth::user()->is_admin))
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Acesso Rápido Funcionários</h6>
                        </div>
                        <div class="bg-white py-2 px-3 collapse-inner rounded text-center">
                            <div class="d-flex flex-column align-items-center gap-3 mt-3">
                                <div class="position-relative mb-2">
                                    <a class="btn btn-outline-primary" href="{{ route('Ficha.create') }}">Criar Ficha</a>
                                    <i class="fas fa-info-circle text-muted ms-2" data-bs-toggle="tooltip"
                                        data-bs-placement="right" title="Criar fichas para os alunos"></i>
                                </div>
                                <div class="position-relative mb-2">
                                    <a class="btn btn-outline-primary" href="{{ route('Aluno.index') }}">Cad. Alunos</a>
                                    <i class="fas fa-info-circle text-muted ms-2" data-bs-toggle="tooltip"
                                        data-bs-placement="right"
                                        title="Cadastrar, editar, deletar e visualizar fichas dos alunos"></i>
                                </div>
                                <div class="position-relative mb-2">
                                    <a class="btn btn-outline-primary" href="{{ route('Exercicio.create') }}">Cad.
                                        Exercícios</a>
                                    <i class="fas fa-info-circle text-muted ms-2" data-bs-toggle="tooltip"
                                        data-bs-placement="right" title="Criar exercícios e suas categorias"></i>
                                </div>
                                @if (Auth::user() && Auth::user()->is_admin)
                                    <div class="position-relative mb-2">
                                        <a class="btn btn-outline-primary" href="{{ route('Instrutor.index') }}">Cad.
                                            Instrutores</a>
                                        <i class="fas fa-info-circle text-muted ms-2" data-bs-toggle="tooltip"
                                            data-bs-placement="right" title="Cadastrar, editar e deletar instrutores"></i>
                                    </div>
                                @endif


                            </div>
                        </div>
                    </div>
                @endif

            </div>
        </div>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
                tooltipTriggerList.forEach(function(tooltipTriggerEl) {
                    new bootstrap.Tooltip(tooltipTriggerEl);
                });
            });
        </script>
    @endsection
