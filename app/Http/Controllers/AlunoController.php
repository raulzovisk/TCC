<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        $alunos = $query->paginate(5);

        return view('aluno.index', ['alunos' => $alunos]);
    }


    public function create(Request $request)
    {
        return view('aluno.create');
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'altura' => 'required|numeric',
            'peso' => 'required|numeric',
            'genero' => 'required|max:1',
            // 'gordura' => 'required|integer',
            // 'musculo' => 'required|integer',
            'idade' => 'required|integer',
            'id_user' => 'required|integer|unique:aluno,id_user'
        ]);

        $obj = new Aluno();
        $obj->altura = $request->altura;
        $obj->peso = $request->peso;
        $obj->genero = $request->genero;
        $obj->gordura = $request->gordura;
        $obj->musculo = $request->musculo;
        $obj->idade = $request->idade;
        $obj->id_user = $request->id_user;

        $aluno = Aluno::firstOrNew(['id_user' => $request->id_user]);

        $aluno->fill($validated);
        $aluno->save();

        return redirect()->route('dashboard')->with('success', 'Aluno salvo com sucesso!');
    }

    //Edit -> Cria a view de edição de alunos.
    public function edit(Request $request, $id)
    {
        $aluno = Aluno::findOrFail($id);
        return view('Aluno.edit', compact('aluno'));

    }


    public function show()
    {
        $userId = Auth::id(); // Obtém o ID do usuário autenticado
        $aluno = Aluno::where('id_user', $userId)->first(); // Busca o aluno pelo ID do usuário
        if (!$aluno) {
            return redirect()->route('dashboard')->with('message', 'Você deve se cadastrar primeiro.');
        }

        return view('aluno.show', compact('aluno')); // Retorna a view com os dados do aluno
    }


    public function update(Request $request, $id)
{
    $userId = Auth::id();
    $Aluno = Aluno::findOrFail($id);

    $Aluno->altura = $request->altura;
    $Aluno->peso = $request->peso;
    //$Aluno->genero = $request->genero;
    $Aluno->gordura = $request->gordura;
    $Aluno->musculo = $request->musculo;
    $Aluno->idade = $request->idade;
    $Aluno->save();

    // Redireciona de volta com uma mensagem de sucesso
    return redirect()->route('Aluno.index')->with('success', 'Dados do aluno atualizados com sucesso!');
}

    public function delete(Request $request, $id)
    {
        $obj = Aluno::findOrFail($id);
        $obj->delete();

        return redirect()->route('aluno.index');
    }

    public function teste(Request $request)
    {
        return view('aluno.teste');
    }

}
