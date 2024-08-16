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
            ->orderBy('aluno.id', 'desc');

        if ($request->has('search')) {
            $search = $request->get('search');
            $query->where('users.name', 'like', "%{$search}%");
        }

        $alunos = $query->paginate(10);

        return view('aluno.index', ['alunos' => $alunos]);
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
    $aluno = new Aluno();
    $aluno->id_user = $request->input('id_user');
    $aluno->idade = $request->input('idade');

    $aluno->save();

    $medidaCorporal = new MedidaCorporal();
    $medidaCorporal->id_aluno = $aluno->id;
    $medidaCorporal->data_medida = now(); 
    $medidaCorporal->peso = str_replace(',', '.', $request->input('peso'));
    $medidaCorporal->altura = str_replace(',', '.', $request->input('altura'));
    $medidaCorporal->gordura = str_replace(',', '.', $request->input('gordura'));
    $medidaCorporal->genero = $request->input('genero');
    $medidaCorporal->cintura = str_replace(',', '.', $request->input('cintura'));
    $medidaCorporal->quadril = str_replace(',', '.', $request->input('quadril'));
    $medidaCorporal->peito = str_replace(',', '.', $request->input('peito'));
    $medidaCorporal->braco_direito = str_replace(',', '.', $request->input('braco_direito'));
    $medidaCorporal->braco_esquerdo = str_replace(',', '.', $request->input('braco_esquerdo'));
    $medidaCorporal->coxa_direita = str_replace(',', '.', $request->input('coxa_direita'));
    $medidaCorporal->coxa_esquerda = str_replace(',', '.', $request->input('coxa_esquerda'));

    $medidaCorporal->save();

    return redirect()->route('Aluno.index')->with('success', 'Aluno criado com sucesso!');
}

    public function edit(Request $request, $id)
    {
        $aluno = Aluno::findOrFail($id);
        return view('Aluno.edit', compact('aluno'));

    }

    public function show($id)
    {
        $aluno = Aluno::findOrFail($id);
        $medidaCorporal = $aluno->medidasCorporais()->latest()->first(); // Obtém a medida mais recente

        return view('Aluno.show', compact('aluno', 'medidaCorporal'));
    }

    public function showAll()
    {
        $userId = Auth::id();
        $aluno = Aluno::where('id_user', $userId)->first();

        $historico = $aluno ? $aluno->historico : [];
        $currentData = $aluno ? $aluno->only(['altura', 'peso', 'gordura', 'musculo', 'idade']) : [];
        return view('aluno.showAll', compact('aluno', 'historico', 'currentData'));
    }

    public function update(Request $request, $id)
{
    // Encontra o aluno
    $aluno = Aluno::findOrFail($id);

    // Recupera a última entrada de medidas corporais ou cria uma nova instância
    $medidaCorporal = $aluno->medidasCorporais()->latest()->first() ?? new MedidaCorporal(['id_aluno' => $aluno->id]);

    // Adicionar dados antigos ao histórico
    $historico = $medidaCorporal->historico_medidas ?? [];
    $historico[] = [
        'data_medida' => $medidaCorporal->data_medida ?? now(),
        'altura' => $medidaCorporal->altura,
        'peso' => $medidaCorporal->peso,
        'gordura' => $medidaCorporal->gordura,
        'cintura' => $medidaCorporal->cintura,
        'quadril' => $medidaCorporal->quadril,
        'peito' => $medidaCorporal->peito,
        'braco_direito' => $medidaCorporal->braco_direito,
        'braco_esquerdo' => $medidaCorporal->braco_esquerdo,
        'coxa_direita' => $medidaCorporal->coxa_direita,
        'coxa_esquerda' => $medidaCorporal->coxa_esquerda,
    ];

    // Atualizar dados com os novos valores do request
    $medidaCorporal->data_medida = now();
    $medidaCorporal->altura = str_replace(',', '.', $request->input('altura'));
    $medidaCorporal->peso = str_replace(',', '.', $request->input('peso'));
    $medidaCorporal->gordura = str_replace(',', '.', $request->input('gordura'));
    $medidaCorporal->cintura = str_replace(',', '.', $request->input('cintura'));
    $medidaCorporal->quadril = str_replace(',', '.', $request->input('quadril'));
    $medidaCorporal->peito = str_replace(',', '.', $request->input('peito'));
    $medidaCorporal->braco_direito = str_replace(',', '.', $request->input('braco_direito'));
    $medidaCorporal->braco_esquerdo = str_replace(',', '.', $request->input('braco_esquerdo'));
    $medidaCorporal->coxa_direita = str_replace(',', '.', $request->input('coxa_direita'));
    $medidaCorporal->coxa_esquerda = str_replace(',', '.', $request->input('coxa_esquerda'));
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

}
