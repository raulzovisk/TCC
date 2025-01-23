<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Ficha;
use Illuminate\Http\Request;
use App\Models\Exercicio;
use App\Models\Aluno;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
class FichaController extends Controller
{
    public function index()
    {
        $aluno = Aluno::where('id_user', auth()->user()->id)->first();

        if ($aluno) {
            $fichas = Ficha::where('id_aluno', $aluno->id)->get();
        } else {
            $fichas = collect();
        }

        return view('Ficha.index', compact('fichas'));
    }

    public function create()
    {
        $alunos = Aluno::all();
        $categorias = Categoria::all();
        $exercicios = Exercicio::all();

        return view('Ficha.create', compact('alunos', 'categorias', 'exercicios'));
    }

    public function show($id)
    {
        $ficha = Ficha::with('exercicios')->findOrFail($id);

        return view('Ficha.show', ['ficha' => $ficha]);
    }

    public function store(Request $request)
    {
        // Validação dos dados da requisição
        $validatedData = $request->validate([
            'nome' => 'required',
            'descricao' => 'required',
            'data' => 'required|date',
            'id_aluno' => 'required|integer',
            'exercicios' => 'required|array',
            'exercicios.*.id_exercicio' => 'required|exists:exercicio,id',
            'exercicios.*.repeticoes' => 'required|string',
            'exercicios.*.series' => 'required|string',
            'exercicios.*.observacoes' => 'nullable|string|max:255',
        ]);

        $ficha = Ficha::create([
            'nome' => $validatedData['nome'],
            'descricao' => $validatedData['descricao'],
            'data' => $validatedData['data'],
            'id_aluno' => $validatedData['id_aluno'],
        ]);

        foreach ($validatedData['exercicios'] as $exercicio) {
            $ficha->exercicios()->attach($exercicio['id_exercicio'], [
                'repeticoes' => $exercicio['repeticoes'],
                'series' => $exercicio['series'],
                'observacoes' => $exercicio['observacoes'] ?? null,
            ]);
        }

        return redirect()->route('instrutor.ver_fichas_aluno', ['alunoId' => $validatedData['id_aluno']])
            ->with('success', 'Ficha criada com sucesso!');
    }


    public function edit($id)
    {
        $ficha = Ficha::findOrFail($id);
        $exercicios = Exercicio::all();
        $alunos = Aluno::all();
        return view('Ficha.edit', compact('ficha', 'exercicios', 'alunos'));
    }

    public function update(Request $request, $id)
    {
        // Encontrar a ficha pelo ID
        $ficha = Ficha::findOrFail($id);
        $alunoId = $ficha->id_aluno;

        // Atualizar nome e descrição
        $ficha->descricao = $request->input('descricao');
        $ficha->nome = $request->input('nome');
        $ficha->save();

        // Obter exercícios e detalhes
        $exercicios = $request->input('exercicios', []);
        $detalhes = $request->input('detalhes', []);

        // Desanexar os exercícios antigos
        $ficha->exercicios()->detach();

        // Anexar os novos exercícios com os detalhes
        foreach ($exercicios as $exercicioId) {
            $ficha->exercicios()->attach($exercicioId, [
                'series' => $detalhes[$exercicioId]['series'] ?? '',
                'repeticoes' => $detalhes[$exercicioId]['repeticoes'] ?? '',
                'observacoes' => $detalhes[$exercicioId]['observacoes'] ?? '',
            ]);
        }

        return redirect()->route('instrutor.ver_fichas_aluno', ['alunoId' => $alunoId])->with('success', 'Ficha atualizada com sucesso!');
    }

    public function delete($id)
    {
        $ficha = Ficha::findOrFail($id);
        $ficha->delete();

        return redirect()->back()->with('success', 'Ficha deletada com sucesso!');
    }



    public function getFichas(Request $request)
    {
        // obtém o usuário autenticado através da requisição
        $user = $request->user();

        // encontra o aluno relacionado ao usuário autenticado. 
        $aluno = $user->aluno;

        // verifica se o aluno foi encontrado, caso não, retorna um erro 404 com a mensagem 'Aluno não encontrado.'
        if (!$aluno) {
            return response()->json(['message' => 'Aluno não encontrado.'], 404);
        }

        // busca as fichas do aluno, incluindo os exercícios associados a cada ficha.
        // 'exercicios' é um relacionamento de 'Ficha' que contém os exercícios.
        // o 'with' é usado para carregar os exercícios relacionados.
        $fichas = Ficha::with([
            'exercicios' => function ($query) {
                // seleciona apenas os campos 'id', 'nome', e 'img_itens' dos exercícios
                $query->select('id', 'nome', 'img_itens');
            }
        ])
            // filtra as fichas relacionadas ao aluno, com base no id do aluno
            ->where('id_aluno', $aluno->id)
            // recupera as fichas encontradas
            ->get();

        // inclui as URLs completas das imagens dos exercícios
        $fichas = $fichas->map(function ($ficha) {
            // para cada ficha, percorre os exercícios relacionados
            $ficha->exercicios->each(function ($exercicio) {
                // verifica se o exercício tem uma imagem associada e cria a URL da imagem
                // se não houver imagem, uma imagem padrão 'noimage.png' será usada
                $exercicio->img_url = $exercicio->img_itens
                    ? asset("storage/img_itens/{$exercicio->img_itens}")
                    : asset("storage/img_itens/noimage.png");
            });
            // retorna a ficha com os exercícios atualizados
            return $ficha;
        });

        // verifica se a coleção de fichas está vazia, se sim, retorna um erro 404 com a mensagem 'Nenhuma ficha encontrada.'
        if ($fichas->isEmpty()) {
            return response()->json(['message' => 'Nenhuma ficha encontrada.'], 404);
        }

        // retorna a lista de fichas com status 200 (sucesso)
        return response()->json($fichas, 200);
    }



}
