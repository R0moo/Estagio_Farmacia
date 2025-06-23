<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;
Use App\Models\Projeto;
use App\Models\Estudante;
use Illuminate\Support\Facades\Storage;
use App\Mail\InscricaoCursoMail;
use Illuminate\Support\Facades\Mail;

class CursoController extends Controller
{
    public function index(Request $request)
    {   
        $cursos = Curso::all();
        $routeName = request()->route()->getName();

    if ($routeName === 'cursos.index') {
        if ($request->has('curso_id') && $request->has('show_modal')) {

        $curso = Curso::findorFail($request->curso_id);
        
        if (!$curso) {
            abort(404);
        }
        
        $user = auth()->user();
        $shouldOpenModal = !$user || ($user->isStudent() && !$user->cursos->contains($curso->id));
            if ($shouldOpenModal) {
            return view('cursos.index', [
                'cursos' => $cursos,
                'modalData' => $curso
            ]);
            }else{
                $projeto = $curso->projeto;
                $estudantes = Estudante::all();
                return view('projetos.cursos.show', compact('projeto', 'curso', 'estudantes', ));
            }
            }
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
        'resumo' => 'nullable',
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

    public function show(Projeto $projeto, Curso $curso)
{
    if ($curso->projeto_id != $projeto->id) {
        abort(404);
    }

    $estudantes = Estudante::all();
    return view('projetos.cursos.show', compact('projeto', 'curso', 'estudantes', ));
}

public function edit(Projeto $projeto, Curso $curso)
{
    return view('projetos.cursos.edit', compact('projeto', 'curso'));
}

public function update(Request $request, Projeto $projeto, Curso $curso)
{
    $validated = $request->validate([
        'titulo' => 'required|string|max:255',
        'resumo' => 'nullable',
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

    public function inscrever(Curso $curso)
    {
    return view('cursos.form-inscricao', compact('curso'));
    }

    public function processarInscricao(Request $request, Curso $curso){
    $request->validate([
        'nome' => 'required|string|max:100',
        'email' => 'required|email',
        'cpf' => 'required|string|max:11',
        'ocupacao' => 'required|string|max:100',
    ]);

    $dados = $request->only(['nome', 'email', 'cpf', 'ocupacao']);
    $dados['curso_nome'] = $curso->titulo; 

    Mail::to('romo@exemplo.com')->send(new InscricaoCursoMail($dados));

    return redirect()->route('cursos.index')->with('success', 'Solicitação de inscrição enviada com sucesso!');
    }
}
