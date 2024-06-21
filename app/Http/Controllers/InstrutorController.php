<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\Instrutor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Middleware\AdminMiddleware;

class InstrutorController extends Controller
{

    public function index(Request $request)
    {
        $query = Instrutor::join('users', 'instrutor.id_user', '=', 'users.id')
            ->select('instrutor.*', 'users.name')
            ->orderBy('instrutor.id', 'desc');

        if ($request->has('search')) {
            $search = $request->get('search');
            $query->where('users.name', 'like', "%{$search}%");
        }

        $instrutores = $query->paginate(10);

        return view('instrutor.index', ['instrutores' => $instrutores]);
    }



    public function create(Request $request)
    {
        return view('instrutor.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_user' => 'required|integer',
            'status' => 'required|char',
        ]);

        $obj = new Instrutor();
        $obj->id_user = $request->id_user;
        $obj->status = $request->status;
        $obj->save();

        return redirect()->route('instrutor.index');
    }

    public function edit(Request $request, $id)
    {
        $instrutor = Instrutor::findOrFail($id);
        return view('Instrutor.edit', ['instrutor' => $instrutor]);

    }
    public function update(Request $request, $id)
    {
        $Instrutor = Instrutor::findOrFail($id);

        $Instrutor->status = $request->status;
        $Instrutor->save();


        $Instrutor->update($request->all());

        return redirect()->route('Instrutor.index')->with('success', 'Dados do Instrutor atualizados com sucesso!');
    }
    public function delete(Request $request, $id)
    {
        $instrutor = Instrutor::findOrFail($id);
        $instrutor->forceDelete();

        return redirect()->route('Instrutor.index')->with('success', 'Instrutor desvinculado com sucesso!');
        
    }

    public function assign()
    {
        $users = User::whereNotIn('id', function ($query) {
            $query->select('id_user')->from('instrutor');
        })->get();

        return view('instrutor.assign', compact('users'));
    }

    public function assignUser($id)
    {
        $user = User::find($id);

        $existingInstrutor = Instrutor::where('id_user', $user->id)->first();

        if ($existingInstrutor) {
            return redirect()->route('Instrutor.index')->with('error', 'Este usuário já é um instrutor.');
        }

        $instrutor = new Instrutor();
        $instrutor->id_user = $user->id;
        $instrutor->status = 'Ativo 🟢' ; 
        
        $instrutor->save();

        return redirect()->route('Instrutor.index')->with('success', 'Instrutor atribuído com sucesso');
    }


    public function verFichasAluno($alunoId)
    {
        $aluno = Aluno::with('fichas.instrutor')->findOrFail($alunoId);
        return view('Instrutor.ver_fichas_aluno', compact('aluno'));
    }
}
