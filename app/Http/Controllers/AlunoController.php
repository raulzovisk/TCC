<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use Illuminate\Http\Request;

class AlunoController extends Controller
{
    public function index (Request $request){
        return view('aluno.index', ['alunos' => Aluno::orderBy('id', 'desc')->paginate(5)]);
    }

    public function create(Request $request)
    {
        return view('aluno.create');
    }

    
    public function store(Request $request ){
        $validated = $request->validate([
            'altura' => 'required|numeric',
            'peso' => 'required|numeric',
            'genero' => 'required|max:1',
            'gordura' => 'required|integer',
            'musculo' => 'required|integer',
            'idade' => 'required|integer',
            'id_user' => 'required|integer',
        ]);

        $obj = new Aluno();
        $obj->altura = $request->altura;
        $obj->peso = $request->peso;
        $obj->genero = $request->genero;
        $obj->gordura = $request->gordura;
        $obj->musculo = $request->musculo;
        $obj->idade = $request->idade;
        $obj->id_user = $request->id_user;
        
        $obj->save();

        return redirect()->route('dashboard');
    }

    //Edit -> Cria a view de edição de alunos.
    public function edit(Request $request, $id)
    {
        $Aluno = Aluno::findOrFail($id);
        return view('Aluno.edit', ['aluno' => $Aluno]);
    }
    public function update(Request $request, $id){
        $Aluno = Aluno::findOrFail($id);

        $Aluno->altura = $request->altura;
        $Aluno->peso = $request->peso;
        $Aluno->genero = $request->genero;
        $Aluno->gordura = $request->gordura;
        $Aluno->musculo = $request->musculo;
        $Aluno->idade = $request->idade;
        $Aluno->id_user = $request->id_user;
        $Aluno->save();

       return redirect()->route('aluno.index');
    }
    public function delete(Request $request, $id){
        $obj = Aluno::findOrFail($id);
        $obj->delete();

        return redirect()->route('aluno.index');
    }

    public function teste(Request $request){
        return view('aluno.teste');
    }
}
