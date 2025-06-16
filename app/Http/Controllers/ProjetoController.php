<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Projeto;
use App\Models\Curso;
use Illuminate\Support\Facades\Storage;

class ProjetoController extends Controller
{
    public function index()
    {
        $projetos = Projeto::all();
        return view('projetos.index', compact('projetos'));
    }

    public function create()
    {
        return view('projetos.create');
    }

    public function store(Request $request)
{
    $validated = $request->validate([
        'titulo' => 'required|string|max:255',
        'descricao' => 'required|string',
        'capa' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        'cor1' => 'required',
        'cor2' => 'required',
    ]);

    if ($request->hasFile('capa')) {
        $path = $request->file('capa')->store('uploads', 'public');
        $validated['capa'] = $path;
    }

    Projeto::create($validated);

    return redirect()->route('projetos.index')->with('success', 'Projeto criado com sucesso!');
}

    public function show($id)
    {
        $projeto = Projeto::findOrFail($id);
        $cursos = Curso::all();
        return view('projetos.show', compact('projeto', 'cursos'))->with(['layoutColors' => ['cor1' => $projeto->cor1, 'cor2' => $projeto->cor2]]);
    }

    public function edit($id)
    {
        $projeto = Projeto::findOrFail($id);
        return view('projetos.edit', compact('projeto'));
    }

    public function update(Request $request, $id)
    {   

        $projeto = Projeto::findOrFail($id);
    
    $validated = $request->validate([
        'titulo' => 'required|string|max:255',
        'descricao' => 'required|string',
        'capa' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'cor1' => 'required',
        'cor2' => 'required',
    ]);
        if ($request->hasFile('capa')) {
        if ($projeto->capa && \Storage::disk('public')->exists($projeto->capa)) {
            \Storage::disk('public')->delete($projeto->capa);
        }

        $path = $request->file('capa')->store('uploads', 'public');
        $validated['capa'] = $path;
    }
        $projeto->update($validated);
        return redirect()->route('projetos.index')->with('success', 'Projeto atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $projeto = Projeto::findOrFail($id);
        if ($projeto->capa && Storage::disk('public')->exists($projeto->capa)) {
        Storage::disk('public')->delete($projeto->capa);
        }
        $projeto->delete();
        return redirect()->route('projetos.index')->with('success', 'Projeto removido com sucesso!');
    }
}
