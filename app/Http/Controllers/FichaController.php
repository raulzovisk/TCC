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

        return view('ficha.index', compact('fichas'));
    }

    public function create()
    {
        $alunos = Aluno::all();
        $categorias = Categoria::all();
        $exercicios = Exercicio::all();

        return view('ficha.create', compact('alunos', 'categorias', 'exercicios'));
    }

    public function show($id)
    {
        $ficha = Ficha::with('exercicios')->findOrFail($id);

        return view('ficha.show', ['ficha' => $ficha]);
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

        return redirect('/dashboard')->with('success', 'Ficha criada com sucesso!');
    }


    public function edit($id)
    {
        $ficha = Ficha::findOrFail($id);
        $exercicios = Exercicio::all();
        $alunos = Aluno::all();
        return view('ficha.edit', compact('ficha', 'exercicios', 'alunos'));
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
        // Obtém o usuário autenticado
        $user = $request->user();
        
        // Encontrar o aluno relacionado ao usuário autenticado
        $aluno = $user->aluno;  // Presume-se que o usuário tenha um relacionamento 'aluno'

        if (!$aluno) {
            return response()->json(['message' => 'Aluno não encontrado.'], 404);
        }

        // Buscar as fichas relacionadas ao aluno, incluindo os exercícios
        $fichas = Ficha::with('exercicios') // Inclui os exercícios relacionados à ficha
                        ->where('id_aluno', $aluno->id)
                        ->get();

        if ($fichas->isEmpty()) {
            return response()->json(['message' => 'Nenhuma ficha encontrada.'], 404);
        }

        return response()->json($fichas, 200);
    }

}
