<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Exercicio;
use Illuminate\Http\Request;
use Storage;

class ExercicioController extends Controller
{
    public function index(Request $request)
    {
        return view('Exercicio.index', ['exercicios' => Exercicio::orderBy('id', 'desc')->paginate(5)]);

    }

    public function create()
    {
        $categorias = Categoria::all();
        return view('Exercicio.create', ['categorias' => $categorias]);

    }

    public function store(Request $request)
    {
        // Validando os campos necessários
        $validated = $request->validate([
            'nome' => 'required|max:255',
            'id_categoria' => 'required|integer',
            'img_itens' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Lógica de upload de imagem
        if ($request->hasFile('img_itens')) {
            // Obtendo o nome completo do arquivo com a extensão
            $filenameWithExt = $request->file('img_itens')->getClientOriginalName();
            // Extraindo o nome do arquivo
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Extraindo a extensão do arquivo
            $extension = $request->file('img_itens')->getClientOriginalExtension();
            // Gerando um nome único para o arquivo
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            // Fazendo o upload da imagem
            $path = $request->file('img_itens')->storeAs('public/img_itens', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.png';
        }

        // Criando o objeto e salvando os dados no banco
        $obj = new Exercicio();
        $obj->nome = $request->nome;
        $obj->id_categoria = $request->id_categoria;
        $obj->img_itens = $fileNameToStore; // Armazenando o nome do arquivo no banco
        $obj->save();

        // Redirecionando para o dashboard com uma mensagem de sucesso
        $categorias = Categoria::all();
        return view('Exercicio.create', ['categorias' => $categorias])->with('success', 'Exercício criado com sucesso.');
    }


    public function edit(Request $request, $id)
    {
        $Exercicio = Exercicio::findOrFail($id);
        return view('Exercicio.edit', ['exercicio' => $Exercicio]);
    }
    public function update(Request $request, $id)
    {
        $Exercicio = Exercicio::findOrFail($id);

        // Validar os campos necessários
        $validated = $request->validate([
            'nome' => 'required|max:255',
            'id_categoria' => 'required|integer',
            'img_itens' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Lógica de upload de imagem
        if ($request->hasFile('img_itens')) {
            // Obtendo o nome completo do arquivo com a extensão
            $filenameWithExt = $request->file('img_itens')->getClientOriginalName();
            // Extraindo o nome do arquivo
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Extraindo a extensão do arquivo
            $extension = $request->file('img_itens')->getClientOriginalExtension();
            // Gerando um nome único para o arquivo
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            // Fazendo o upload da imagem
            $path = $request->file('img_itens')->storeAs('public/img_itens', $fileNameToStore);

            // Deletar a imagem antiga se existir
            if ($Exercicio->img_itens !== 'noimage.png') {
                Storage::delete('public/img_itens/' . $Exercicio->img_itens);
            }

            // Atualizando o campo da imagem com o novo nome do arquivo
            $Exercicio->img_itens = $fileNameToStore;
        }

        $Exercicio->nome = $request->nome;

        // Verificar se a categoria no request é nula
        if ($request->filled('id_categoria')) {
            $Exercicio->id_categoria = $request->id_categoria;
        }

        $Exercicio->save();

        return redirect()->route('Exercicio.create')->with('success', 'Exercício atualizado com sucesso.');
    }

    public function delete(Request $request, $id)
    {
        $exercicio = Exercicio::findOrFail($id);
        $exercicio->forceDelete();

        return redirect()->route('Exercicio.create')->with('success', 'Exercício excluído com sucesso!');
    }

}
