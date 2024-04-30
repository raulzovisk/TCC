<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Exercicio;
use Illuminate\Http\Request;

class ExercicioController extends Controller
{
    public function index (Request $request){
        return view('exercicio.index', ['exercicios' => Exercicio::orderBy('id', 'desc')->paginate(5)]);
        
    }

    public function create()
{
    $categorias = Categoria::all();
    return view('exercicio.create', ['categorias' => $categorias]);
}



    public function store(Request $request ){
        $validated = $request->validate([
            'nome' => 'required|max:255',
            'series' => 'integer',
            'repeticoes' => 'integer',
            'id_categoria' => 'required|integer',
        ]);

        $obj = new Exercicio();
        $obj->nome = $request->nome;
        $obj->series = $request->series;
        $obj->repeticoes = $request->repeticoes;
        $obj->id_categoria = $request->id_categoria;
        $obj->save();

        return view('/dashboard');
    }

    public function edit(Request $request, $id)
    {
        $Exercicio = Exercicio::findOrFail($id);
        return view('Exercicio.edit', ['exercicio' => $Exercicio]);
    }
    public function update(Request $request, $id){
        $Exercicio = Exercicio::findOrFail($id);

        $Exercicio->nome = $request->nome;
        $Exercicio->series = $request->series;
        $Exercicio->repeticoes = $request->repeticoes;
        $Exercicio->id_categoria = $request->id_categoria;
        $Exercicio->save();

       return redirect()->route('exercicio.index');
    }
    public function delete(Request $request, $id){
        $obj = Exercicio::findOrFail($id);
        $obj->delete();

        return redirect()->route('exercicio.index');
    }

    public function teste(Request $request){
        return view('exercicio.teste');
    }
}
