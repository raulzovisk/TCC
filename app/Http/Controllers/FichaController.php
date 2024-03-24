<?php

namespace App\Http\Controllers;

use App\Models\Ficha;
use Illuminate\Http\Request;

class FichaController extends Controller
{
    public function index(Request $request)
    {
        return view('ficha.index', ['fichas' => Ficha::orderBy('id', 'desc')->paginate(5)]);
    }

    public function create(Request $request)
    {
        return view('ficha.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'objetivo' => 'required',
            'descricao' => 'required|max:255',
            'data' => 'required|date',
            'id_instrutor' => 'required|integer',
            'id_aluno' => 'required|integer',
        ]);

        $obj = new Ficha();
        $obj->objetivo = $request->objetivo;
        $obj->descricao = $request->descricao;
        $obj->data = $request->data;
        $obj->id_instrutor = $request->id_instrutor;
        $obj->id_aluno = $request->id_aluno;
        $obj->save();

        return redirect()->route('ficha.index');
    }

    public function edit(Request $request, $id)
    {
        $Ficha = Ficha::findOrFail($id);
        return view('Ficha.edit', ['ficha' => $Ficha]);
    }
    public function update(Request $request, $id)
    {
        $Ficha = Ficha::findOrFail($id);

        $Ficha->objetivo = $request->objetivo;
        $Ficha->descricao = $request->descricao;
        $Ficha->data = $request->data;
        $Ficha->id_instrutor = $request->id_instrutor;
        $Ficha->id_aluno = $request->id_aluno;
        $Ficha->save();

        return redirect()->route('ficha.index');
    }
    public function delete(Request $request, $id)
    {
        $obj = Ficha::findOrFail($id);
        $obj->delete();

        return redirect()->route('ficha.index');
    }

    public function teste(Request $request)
    {
        return view('ficha.teste');
    }
}
