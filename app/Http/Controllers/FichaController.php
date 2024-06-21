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


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'objetivo' => 'required',
            'descricao' => 'required',
            'data' => 'required|date',
            'id_aluno' => 'required|integer',
            'exercicios' => 'required|array',
            'exercicios.*.id_exercicio' => 'required|exists:exercicio,id',
            'exercicios.*.repeticoes' => 'required|integer',
            'exercicios.*.series' => 'required|integer',
        ]);
    
        try {
            $ficha = Ficha::create([
                'objetivo' => $validatedData['objetivo'],
                'descricao' => $validatedData['descricao'],
                'data' => $validatedData['data'],
                'id_aluno' => $validatedData['id_aluno'],
            ]);
    
            foreach ($validatedData['exercicios'] as $exercicio) {
                $ficha->exercicios()->attach($exercicio['id_exercicio'], [
                    'repeticoes' => $exercicio['repeticoes'],
                    'series' => $exercicio['series'],
                ]);
            }
    
            Log::info('Ficha criada com sucesso', ['ficha_id' => $ficha->id]);
        } catch (\Exception $e) {
            Log::error('Erro ao criar a ficha', ['exception' => $e]);
            return back()->with('error', 'Erro ao criar a ficha. Por favor, tente novamente.');
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
        $ficha = Ficha::findOrFail($id);
        $alunoId = $ficha->id_aluno; 
    
        $ficha->descricao = $request->input('descricao');
        $ficha->objetivo = $request->input('objetivo');
        $ficha->save();
    
        $exercicios = $request->input('exercicios', []);
        $detalhes = $request->input('detalhes', []);
    
        $ficha->exercicios()->detach();
    
        foreach ($exercicios as $exercicioId) {
            $ficha->exercicios()->attach($exercicioId, [
                'series' => $detalhes[$exercicioId]['series'] ?? 0,
                'repeticoes' => $detalhes[$exercicioId]['repeticoes'] ?? 0,
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

    public function show($id)
    {
        $ficha = Ficha::with('exercicios')->findOrFail($id);

        return view('ficha.show', ['ficha' => $ficha]);
    }

}
