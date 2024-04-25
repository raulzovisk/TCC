<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
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
        $aluno->altura = $request->input('altura');
        $aluno->peso = $request->input('peso');
        $aluno->genero = $request->input('genero');
        $aluno->gordura = $request->input('gordura');
        $aluno->musculo = $request->input('musculo');
        $aluno->idade = $request->input('idade');
        $aluno->save();
        return redirect()->route('Aluno.index')->with('success', 'Aluno criado com sucesso!');
    }

   
    public function edit(Request $request, $id)
    {
        $aluno = Aluno::findOrFail($id);
        return view('Aluno.edit', compact('aluno'));

    }


    public function show()
{
    $userId = Auth::id(); // Obtém o ID do usuário autenticado
    $aluno = Aluno::where('id_user', $userId)->first(); // Busca o aluno pelo ID do usuário

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
        $aluno = Aluno::findOrFail($id);
        $aluno->forceDelete();

        return redirect()->route('Aluno.index')->with('success', 'Instrutor desvinculado com sucesso!');
        
    }

    public function teste(Request $request)
    {
        return view('aluno.teste');
    }

}
