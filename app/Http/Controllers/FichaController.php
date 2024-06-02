<?php

namespace App\Http\Controllers;

use App\Models\Ficha;
use Illuminate\Http\Request;
use App\Models\Exercicio;
use App\Models\Aluno;
use Illuminate\Support\Facades\Log;

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
        $exercicios = Exercicio::all();
        return view('ficha.create', ['alunos' => $alunos], ['exercicios' => $exercicios]);
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

        $Ficha->exercicios()->sync($request->exercicios);

        return redirect()->route('ficha.index');
    }
    public function delete(Request $request, $id)
    {
        $obj = Ficha::findOrFail($id);
        $obj->delete();

        return redirect()->route('ficha.index');
    }

    public function show($id)
    {
        $ficha = Ficha::with('exercicios')->findOrFail($id);

        return view('ficha.show', ['ficha' => $ficha]);
    }

}
