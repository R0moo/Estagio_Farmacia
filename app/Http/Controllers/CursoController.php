<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;
Use App\Models\Projeto;
use App\Models\Estudante;
use App\Models\Solicitacao;
use App\Models\Material;
use Illuminate\Support\Facades\Storage;
use App\Mail\NovaInscricaoMail;
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
        $shouldOpenModal = !$user || ($user->isStudent() && (!$user->estudante || $user->estudante->curso_id !== $curso->id));
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

public function create(Projeto $projeto)
{
    
    return view('projetos.cursos.create', compact('projeto'));
}

    public function store(Request $request, Projeto $projeto)
{
    $validated = $request->validate([
        'titulo' => 'required|string|max:255',
        'resumo' => 'nullable',
        'vagas' => 'required|integer',
        'materiais.*' => 'nullable|file|mimes:pdf,doc,docx|max:10240',
        'carga_horaria' => 'required|integer',
        'data_inicio' => 'required|date|after_or_equal:today',
        'data_fim' => 'required|date|after_or_equal:data_inicio',
        'imagem'=> 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        'projeto_id' => 'required|exists:projetos,id',
    ]);

    $materiais = $validated['materiais'] ?? [];
    unset($validated['materiais']);

    if ($request->hasFile('imagem')) {
        $path = $request->file('imagem')->store('uploads', 'public');
        $validated['imagem'] = $path;
    }

    $curso = Curso::create($validated);

    if ($request->hasFile('materiais')) {
        foreach ($request->file('materiais') as $material) {
            $path = $material->store('materiais', 'public');
            
            $curso->materiais()->create([
                'nome' => $material->getClientOriginalName(),
                'caminho_arquivo' => $path,
                'tipo' => $material->getClientOriginalExtension(),
                'tamanho' => $material->getSize(),
            ]);
        }
    }

    return redirect()->route('projetos.show', ["projeto" => $projeto->id])->with('success', 'Curso criado com sucesso!');
}

    public function show(Projeto $projeto, Curso $curso)
{   
     if ($curso->projeto_id != $projeto->id) {
        abort(404);
    }
    if (!auth()->user()->checkCourseAccess($curso->id)) {
        abort(403, 'Acesso não autorizado');
    }

    $estudantes = Estudante::all();
    $materiais = Material::where('curso_id', $curso->id)->get();
    return view('projetos.cursos.show', compact('projeto', 'curso', 'estudantes', 'materiais'));

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

    if ($request->hasFile('materiais')) {
        foreach ($request->file('materiais') as $material) {
            $path = $material->store('materiais', 'public');
            $curso->materiais()->create([
                'nome' => $material->getClientOriginalName(),
                'caminho_arquivo' => $path
            ]);
        }
    }

    return redirect()->route('projetos.show', $projeto)->with('success', 'Curso atualizado com sucesso!');
}


    public function destroy(Projeto $projeto, Curso $curso)
    {
        $curso->delete();
        return redirect()->route('projetos.show', $projeto)->with('success', 'Curso removido com sucesso!');
    }

    public function inscrever(Curso $curso)
    {
        return view('cursos.form-inscricao', compact('curso'));
    }

public function processarInscricao(Request $request, Curso $curso)
{
    $request->validate([
        'nome' => 'required|string|max:100',
        'email' => 'required|email',
        'cpf' => 'required|string|max:11',
        'ocupacao' => 'required|string|max:100',
    ]);

    $solicitacao = Solicitacao::create([
        'curso_id' => $curso->id,
        'nome' => $request->nome,
        'email' => $request->email,
        'cpf' => $request->cpf,
        'ocupacao' => $request->ocupacao,
        'status' => 'pendente'
    ]);

    Mail::to('romo@exemplo.com')->send(new NovaInscricaoMail($curso));

    return redirect()->route('cursos.index')
        ->with('success', 'Solicitação de inscrição enviada com sucesso! Aguarde a aprovação.');
}

    public function adicionarMaterial(Request $request, Projeto $projeto, Curso $curso)
{
    $request->validate([
        'novo_material' => 'required|file|mimes:pdf,doc,docx,ppt,pptx,xls,xlsx|max:10240',
        'nome_material' => 'nullable|string|max:255'
    ]);

    $arquivo = $request->file('novo_material');
    $path = $arquivo->store('materiais', 'public');

    $material = $curso->materiais()->create([
        'nome' => $request->nome_material ?? $arquivo->getClientOriginalName(),
        'caminho_arquivo' => $path,
        'tipo' => $arquivo->getClientOriginalExtension(),
        'tamanho' => $arquivo->getSize(),
    ]);

    return back()->with('success', 'Material adicionado com sucesso!');
}
}
