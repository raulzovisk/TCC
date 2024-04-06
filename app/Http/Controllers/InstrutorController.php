<?php

namespace App\Http\Controllers;

use App\Models\Instrutor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Middleware\AdminMiddleware;

class InstrutorController extends Controller


{

    //Read -> Mostra todos os instrutores na view index de instrutores.
    public function index(Request $request)
    {
        return view('instrutor.index', ['instrutores' => Instrutor::orderBy('id', 'desc')->paginate(5)]);
    }

    //Create -> Cria a view de inserção de instrutores.
    public function create(Request $request)
    {
        return view('instrutor.create');
    }

    //Store -> Insere um instrutor no banco de dados a partir da view create.
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

    //Edit -> Cria a view de edição de instrutores.
    public function edit(Request $request, $id)
    {
        $instrutor = Instrutor::findOrFail($id);
        return view('Instrutor.edit', ['instrutor'=> $instrutor]);

    }
    public function update(Request $request, $id)
    {
        $Instrutor = Instrutor::findOrFail($id);

        $Instrutor->status  = $request->status;
        $Instrutor->save();


        // Atualiza os dados do Instrutor com base nos dados do formulário
        $Instrutor->update($request->all());

        // Redireciona de volta com uma mensagem de sucesso
        return redirect()->route('Instrutor.index')->with('success', 'Dados do Instrutor atualizados com sucesso!');
    }
    public function delete(Request $request, $id)
    {
        $instrutor = Instrutor::findOrFail($id);
        $instrutor->forceDelete();
    
        return redirect()->route('Instrutor.index');
    }
    
    public function assign()
    {
        // Busca todos os usuários que ainda não são instrutores
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
    $instrutor->status = 'ativo'; 
    $instrutor->save();

    return redirect()->route('Instrutor.index');
}


    public function teste(Request $request)
    {
        return view('instrutor.teste');
    }
}
