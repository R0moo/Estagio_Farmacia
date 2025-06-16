<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;
Use App\Models\Projeto;
use App\Models\Estudante;
use Illuminate\Support\Facades\Storage;
use App\Mail\SolicitarInscricao;
use Illuminate\Support\Facades\Mail;

class CursoController extends Controller
{
    public function index()
    {   
        $cursos = Curso::all();
        $routeName = request()->route()->getName();
    
    if ($routeName === 'cursos.index') {
        return view('cursos.index', compact('cursos'));
    } else{
        return view('projetos.show', compact('cursos'));
    }
         
    }

public function create(Projeto $projeto, Curso $curso)
{
    return view('projetos.cursos.create', compact('projeto', 'curso'));
}

    public function store(Request $request, Projeto $projeto)
    {
    $validated = $request->validate([
        'titulo' => 'required|string|max:255',
        'resumo' => 'nullable|string',
        'vagas' => 'required|integer',
        'materiais' => 'nullable|file|mimes:pdf,doc,docx|max:10240',
        'carga_horaria' => 'required|integer',
        'data_inicio' => 'required|date|after_or_equal:today',
        'data_fim' => 'required|date|after_or_equal:data_inicio',
        'imagem'=> 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        'projeto_id' => 'required|exists:projetos,id',
    ]);

    $projeto = $validated['projeto_id'];

    if ($request->hasFile('imagem')) {
        $path = $request->file('imagem')->store('uploads', 'public');
        $validated['imagem'] = $path;
    }

    if ($request->hasFile('materiais')) {
    $validated['materiais'] = $request->file('materiais')->store('materiais', 'public');
    }

    Curso::create($validated);

    return redirect()->route('projetos.show', ["projeto" => $projeto])->with('success', 'Curso criado com sucesso!');
    }

    public function show($id)
    {   
        $curso = Curso::findOrFail($id);
        $estudantes = Estudante::all();
        return view('projetos.cursos.show', compact('curso', 'estudantes'));
    }

public function edit(Projeto $projeto, Curso $curso)
{
    return view('projetos.cursos.edit', compact('projeto', 'curso'));
}

public function update(Request $request, Projeto $projeto, Curso $curso)
{
    $validated = $request->validate([
        'titulo' => 'required|string|max:255',
        'resumo' => 'nullable|string',
        'vagas' => 'required|integer',
        'materiais' => 'nullable|file|mimes:pdf,doc,docx|max:10240',
        'carga_horaria' => 'required|integer',
        'data_inicio' => 'required|date|after_or_equal:today',
        'data_fim' => 'required|date|after_or_equal:data_inicio',
        'imagem'=> 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        'projeto_id' => 'required|exists:projetos,id',
    ]);

    if ($request->hasFile('imagem')) {
        if ($curso->imagem) {
            Storage::delete($curso->imagem);
        }

        $path = $request->file('imagem')->store('uploads', 'public');
        $curso->imagem = str_replace('public/', '', $path);
    }


    $curso->update($validated);

    return redirect()->route('projetos.show', $projeto)->with('success', 'Curso atualizado com sucesso!');
}


    public function destroy($id, Projeto $projetos)
    {
        $curso = Curso::findOrFail($id);
        $curso->delete();
        return redirect()->route('projetos.show', compact('projetos'))->with('success', 'Curso removido com sucesso!');
    }

    public function solicitarInscricao(Request $request, $cursoId)
{
    $curso = Curso::findOrFail($cursoId);
    $estudante = auth()->user();

    Mail::to('romo@exemplo.com')->send(new SolicitarInscricao($curso, $estudante));

    return redirect()->back()->with('success', 'Solicitação de inscrição enviada com sucesso!');
}
}
