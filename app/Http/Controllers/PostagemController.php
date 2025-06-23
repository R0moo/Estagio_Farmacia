<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Postagem;
use App\Models\Projeto;
use Illuminate\Support\Facades\Storage;


class PostagemController extends Controller
{
    public function index(Request $request)
    {
        $postagens = Postagem::all();

        if($request){
        if ($request->has('postagem_id') && $request->has('show_modal')) {

        $postagem = postagem::findorFail($request->postagem_id);
        $projeto = $postagem->projeto;
        if (!$postagem) {
            abort(404);
        }
        
            return view('projetos.show', [
                'postagens' => $postagens,
                'modalData' => $postagem,
                'projeto' => $projeto
            ]);
            
            }
        }
        return view('projetos.show', compact('postagens'));
    }

public function create(Projeto $projeto)
{
    return view('projetos.postagens.create', compact('projeto'));
}

public function store(Request $request)
{
    $validated = $request->validate([
        'titulo' => 'required|string|max:255',
        'descricao' => 'required|string',
        'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        'projeto_id' => 'required|exists:projetos,id',
    ]);

    if ($request->hasFile('foto')) {
        $path = $request->file('foto')->store('uploads', 'public');
        $validated['foto'] = $path;
    }

    Postagem::create($validated);

    return redirect()->route('projetos.show', $request->projeto_id)->with('success', 'Postagem criada com sucesso!');
}

    public function show($id)
    {
        $postagem = Postagem::findOrFail($id);
        return view('projetos.postagens.show', compact('postagem'));
    }

public function edit(Projeto $projeto, Postagem $postagem)
{
    return view('projetos.postagens.edit', compact('projeto', 'postagem'));
}

public function update(Request $request, Projeto $projeto, Postagem $postagem)
{
    // Validação (ajuste conforme campos)
    $request->validate([
        'titulo' => 'required|string|max:255',
        'descricao' => 'required|string',
        'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
    ]);

    // Se veio nova foto, salvar e atualizar o campo
    if ($request->hasFile('foto')) {
        // Apagar imagem antiga se existir
        if ($postagem->foto) {
            Storage::delete($postagem->foto);
        }

        // Salvar nova foto
        $path = $request->file('foto')->store('public/postagens');
        // Armazenar o path relativo no DB (sem 'public/')
        $postagem->foto = str_replace('public/', '', $path);
    }

    // Atualiza demais campos
    $postagem->titulo = $request->titulo;
    $postagem->descricao = $request->descricao;

    $postagem->save();

    return redirect()->route('projetos.show', $projeto->id)->with('success', 'Postagem atualizada com sucesso!');
}



public function destroy(Projeto $projeto, Postagem $postagem)
{
   if ($postagem->foto && Storage::disk('public')->exists($postagem->foto)) {
        Storage::disk('public')->delete($postagem->foto);
    }
    $postagem->delete();

    return redirect()->route('projetos.show', ['projeto' => $projeto->id])->with('success', 'Postagem excluída com sucesso!');
}
}
