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
        ->orderBy('instrutor.id', 'asc');
        
        if ($request->has('search')) {
            $search = $request->get('search');
            $query->where('users.name', 'like', "%{$search}%");
        }
        
        $instrutores = $query->paginate(10);
        
        return view('instrutor.index', ['instrutores' => $instrutores]);
    }
    
    public function create(Request $request)
    {
        $query = User::query()->whereNotIn('id', function ($query) {
            $query->select('id_user')->from('aluno');
        });

        if ($request->has('search')) {
            $search = $request->get('search');
            $query->where('name', 'like', "%{$search}%");
        }

        $users = $query->paginate(10);

        return view('Instrutor.create', compact('users'));
    }
    
    
    public function store($id)
    {
        $user = User::find($id);
    
        $existingInstrutor = Instrutor::where('id_user', $user->id)->first();
    
        if ($existingInstrutor) {
            return redirect()->route('Instrutor.index')->with('error', 'Este usuário já é um instrutor.');
        }
    
        $instrutor = new Instrutor();
        $instrutor->id_user = $user->id;
        
        $instrutor->save();
    
        return redirect()->route('Instrutor.index')->with('success', 'Instrutor atribuído com sucesso');
    }
    public function delete(Request $request, $id)
    {
        $instrutor = Instrutor::findOrFail($id);
        $instrutor->forceDelete();

        return redirect()->route('Instrutor.index')->with('success', 'Instrutor desvinculado com sucesso!');
        
    }
    public function verFichasAluno($alunoId)
    {
        $aluno = Aluno::with('fichas.instrutor')->findOrFail($alunoId);
        return view('Instrutor.ver_fichas_aluno', compact('aluno'));
    }
}
