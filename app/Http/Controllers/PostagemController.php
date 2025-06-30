<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Postagem;
use App\Models\Projeto;
use App\Models\PostagemImagem;
use Illuminate\Support\Facades\Storage;

class PostagemController extends Controller
{
    public function index(Request $request)
    {
        $postagens = Postagem::with('imagens')->get();

        if ($request->has('postagem_id') && $request->has('show_modal')) {
            $postagem = Postagem::findOrFail($request->postagem_id);
            $projeto = $postagem->projeto;

            return view('projetos.show', [
                'postagens' => $postagens,
                'modalData' => $postagem,
                'projeto' => $projeto
            ]);
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
            'imagens.*' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'projeto_id' => 'required|exists:projetos,id',
        ]);

        $postagem = Postagem::create([
            'titulo' => $validated['titulo'],
            'descricao' => $validated['descricao'],
            'projeto_id' => $validated['projeto_id'],
        ]);

        if ($request->hasFile('imagens')) {
            $imagens = $request->file('imagens');

            if (count($imagens) > 10) {
                return back()->withErrors(['imagens' => 'Você pode enviar no máximo 10 imagens.']);
            }

            foreach ($imagens as $imagem) {
                $path = $imagem->store('postagens', 'public');
                $postagem->imagens()->create(['caminho' => $path]);
            }
        }

        return redirect()->route('projetos.show', $postagem->projeto_id)->with('success', 'Postagem criada com sucesso!');
    }

    public function show($id)
    {
        $postagem = Postagem::with('imagens')->findOrFail($id);
        return view('projetos.postagens.show', compact('postagem'));
    }

    public function edit(Projeto $projeto, Postagem $postagem)
    {
        return view('projetos.postagens.edit', compact('projeto', 'postagem'));
    }

    public function update(Request $request, Projeto $projeto, Postagem $postagem)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descricao' => 'required|string',
            'imagens.*' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $postagem->update([
            'titulo' => $request->titulo,
            'descricao' => $request->descricao,
        ]);

        if ($request->hasFile('imagens')) {
            $imagens = $request->file('imagens');

            if (($postagem->imagens()->count() + count($imagens)) > 10) {
                return back()->withErrors(['imagens' => 'Você pode ter no máximo 10 imagens por postagem.']);
            }

            foreach ($imagens as $imagem) {
                $path = $imagem->store('postagens', 'public');
                $postagem->imagens()->create(['caminho' => $path]);
            }
        }

        return redirect()->route('projetos.show', $projeto->id)->with('success', 'Postagem atualizada com sucesso!');
    }

    public function destroy(Projeto $projeto, Postagem $postagem)
    {
        foreach ($postagem->imagens as $imagem) {
            Storage::disk('public')->delete($imagem->caminho);
            $imagem->delete();
        }

        $postagem->delete();

        return redirect()->route('projetos.show', ['projeto' => $projeto->id])->with('success', 'Postagem excluída com sucesso!');
    }
}
