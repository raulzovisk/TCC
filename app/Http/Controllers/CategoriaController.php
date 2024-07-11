<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Exercicio;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index()
    {
        $categorias = Categoria::all();
        return view('categoria.index', ['categorias' => $categorias]);
    }
    

    public function create(Request $request)
    {
        return view('categoria.create');
    }

    public function store(Request $request ){
        $validated = $request->validate([
            'nome' => 'required|max:255',
        ]);

        $obj = new Categoria();
        $obj->nome = $request->nome;
        $obj->save();

        return redirect()->route('Categoria.index')->with('success', 'Categoria criada com sucesso!');
    }

    public function edit(Request $request, $id)
    {
        $Categoria = Categoria::findOrFail($id);
        return view('Categoria.edit', ['categoria' => $Categoria]);
    }
    public function update(Request $request, $id){
        $Categoria = Categoria::findOrFail($id);

        $Categoria->nome = $request->nome;
        $Categoria->save();

        return redirect()->route('Categoria.index')->with('success', 'Dados da categoria atualizados com sucesso!');
    }
    public function delete(Request $request, $id)
    {
        $categorias = Categoria::findOrFail($id);
        $categorias->forceDelete();

        return redirect()->route('Categoria.index')->with('success', 'Categoria excluída com sucesso!');
        
    }
    
    

}
