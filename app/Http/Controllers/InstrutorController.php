<?php

namespace App\Http\Controllers;

use App\Models\Instrutor;
use Illuminate\Http\Request;

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
        $Instrutor = Instrutor::findOrFail($id);
        return view('Instrutor.edit', ['instrutor' => $Instrutor]);
    }
    public function update(Request $request, $id)
    {
        $Instrutor = Instrutor::findOrFail($id);

        $Instrutor->id_user = $request->id_user;
        $Instrutor->status = $request->status;
        $Instrutor->save();

        return redirect()->route('instrutor.index');
    }
    public function delete(Request $request, $id)
    {
        $obj = Instrutor::findOrFail($id);
        $obj->delete();

        return redirect()->route('instrutor.index');
    }

    public function teste(Request $request)
    {
        return view('instrutor.teste');
    }
}
