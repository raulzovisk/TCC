<?php

namespace App\Http\Controllers;

use App\Models\Aluno;

use App\Models\MedidaCorporal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AlunoController extends Controller
{
    public function index(Request $request)
    {
        $query = Aluno::join('users', 'aluno.id_user', '=', 'users.id')
            ->select('aluno.*', 'users.name')
            ->orderBy('aluno.id', 'asc');

        if ($request->has('search')) {
            $search = $request->get('search');
            $query->where('users.name', 'like', "%{$search}%");
        }

        $alunos = $query->paginate(10);

        return view('Aluno.index', ['alunos' => $alunos]);
    }


    public function create($id)
    {
        $user = User::find($id);
        return view('Aluno.create', compact('user'));
    }

    public function list(Request $request)
    {
        $query = User::query()->whereNotIn('id', function ($query) {
            $query->select('id_user')->from('aluno');
        });

        if ($request->has('search')) {
            $search = $request->get('search');
            $query->where('name', 'like', "%{$search}%");
        }

        $users = $query->paginate(10);

        return view('Aluno.list', compact('users'));
    }

    public function store(Request $request)
    {
        // Criação de um novo aluno
        $aluno = new Aluno();
        $aluno->id_user = $request->input('id_user');
        $aluno->idade = $request->input('idade');
        $aluno->save();

        // Criação da Medida Corporal associada ao Aluno
        $medidaCorporal = new MedidaCorporal();
        $medidaCorporal->id_aluno = $aluno->id;
        $medidaCorporal->data_medida = now(); // Data da medida
        $medidaCorporal->peso = $request->input('peso');
        $medidaCorporal->genero = $request->input('genero');
        $medidaCorporal->altura = $request->input('altura');
        $medidaCorporal->gordura = $request->input('gordura');
        $medidaCorporal->cintura = $request->input('cintura');
        $medidaCorporal->quadril = $request->input('quadril');
        $medidaCorporal->peito = $request->input('peito');
        $medidaCorporal->braco_direito = $request->input('braco_direito');
        $medidaCorporal->braco_esquerdo = $request->input('braco_esquerdo');
        $medidaCorporal->coxa_direita = $request->input('coxa_direita');
        $medidaCorporal->coxa_esquerda = $request->input('coxa_esquerda');

        // Inicializa o histórico com os dados atuais
        $medidaCorporal->historico_medidas = [
            [
                'data_medida' => $medidaCorporal->data_medida,
                'peso' => $medidaCorporal->peso,
                'altura' => $medidaCorporal->altura,
                'gordura' => $medidaCorporal->gordura,
                'cintura' => $medidaCorporal->cintura,
                'quadril' => $medidaCorporal->quadril,
                'peito' => $medidaCorporal->peito,
                'braco_direito' => $medidaCorporal->braco_direito,
                'braco_esquerdo' => $medidaCorporal->braco_esquerdo,
                'coxa_direita' => $medidaCorporal->coxa_direita,
                'coxa_esquerda' => $medidaCorporal->coxa_esquerda,
            ]
        ];

        // Salva as medidas corporais
        $medidaCorporal->save();

        return redirect()->route('Aluno.index')->with('success', 'Aluno e medidas corporais criados com sucesso!');
    }

    public function edit(Request $request, $id)
    {
        $aluno = Aluno::findOrFail($id);
        return view('Aluno.edit', compact('aluno'));

    }

    public function show()
    {
        $user = Auth::user();
        $aluno = Aluno::where('id_user', $user->id)->firstOrFail();

        // Recupera a última entrada de medidas corporais
        $medidaCorporal = $aluno->medidasCorporais()->orderBy('data_medida', 'desc')->first();

        // Recupera o histórico completo de medidas
        $historicoMedidas = $medidaCorporal ? $medidaCorporal->historico_medidas : [];

        // Verifica se há medidas anteriores para comparação
        $ultimaMedida = $historicoMedidas ? end($historicoMedidas) : null;

        return view('Aluno.show', compact('aluno', 'medidaCorporal', 'historicoMedidas', 'ultimaMedida'));
    }


    public function update(Request $request, $id)
    {
        $aluno = Aluno::findOrFail($id);

        // Recupera a última medida corporal
        $medidaCorporal = $aluno->medidasCorporais()->orderBy('data_medida', 'desc')->first();

        // Adicionar a medida atual ao histórico antes de atualizar
        $historico = $medidaCorporal->historico_medidas ?? [];
        $historico[] = [
            'data_medida' => $medidaCorporal->data_medida,
            'peso' => $medidaCorporal->peso,
            'altura' => $medidaCorporal->altura,
            'gordura' => $medidaCorporal->gordura,
            'cintura' => $medidaCorporal->cintura,
            'quadril' => $medidaCorporal->quadril,
            'peito' => $medidaCorporal->peito,
            'braco_direito' => $medidaCorporal->braco_direito,
            'braco_esquerdo' => $medidaCorporal->braco_esquerdo,
            'coxa_direita' => $medidaCorporal->coxa_direita,
            'coxa_esquerda' => $medidaCorporal->coxa_esquerda,
        ];

        // Atualizar os dados da medida corporal com os novos valores do request
        $medidaCorporal->data_medida = now();
        $medidaCorporal->peso = $request->input('peso');
        $medidaCorporal->altura = $request->input('altura');
        $medidaCorporal->gordura = $request->input('gordura');
        $medidaCorporal->cintura = $request->input('cintura');
        $medidaCorporal->quadril = $request->input('quadril');
        $medidaCorporal->peito = $request->input('peito');
        $medidaCorporal->braco_direito = $request->input('braco_direito');
        $medidaCorporal->braco_esquerdo = $request->input('braco_esquerdo');
        $medidaCorporal->coxa_direita = $request->input('coxa_direita');
        $medidaCorporal->coxa_esquerda = $request->input('coxa_esquerda');

        // Atualizar o histórico de medidas
        $medidaCorporal->historico_medidas = $historico;

        // Salvar as alterações
        $medidaCorporal->save();

        return redirect()->route('Aluno.index')->with('success', 'Dados do aluno atualizados com sucesso!');
    }

    public function delete(Request $request, $id)
    {
        $aluno = Aluno::findOrFail($id);
        $aluno->forceDelete();

        return redirect()->route('Aluno.index')->with('success', 'Aluno desvinculado com sucesso!');

    }

    public function getMedidas(Request $request)
    {
        // Obtém o usuário autenticado
        $user = $request->user();

        // Encontrar o aluno relacionado ao usuário autenticado
        $aluno = $user->aluno;

        if (!$aluno) {
            return response()->json(['message' => 'Aluno não encontrado.'], 404);
        }

        // Buscar as medidas corporais relacionadas ao aluno
        $medidas = $aluno->medidasCorporais; // Usando o relacionamento

        if ($medidas->isEmpty()) {
            return response()->json(['message' => 'Nenhuma medida corporal encontrada.'], 404);
        }

        return response()->json($medidas, 200);
    }
}
