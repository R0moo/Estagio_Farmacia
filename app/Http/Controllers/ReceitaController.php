<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Receita;
use Illuminate\Support\Facades\Storage;

class ReceitaController extends Controller
{
    public function index()
    {
        $receitas = Receita::all();
        return view('receitas.index', compact('receitas'));
    }

    public function create()
    {
        return view('receitas.create');
    }

public function store(Request $request)
{
    $validated = $request->validate([
        'titulo' => 'required|string|max:255',
        'descricao' => 'required|string',
        'ingredientes' => 'required|string',
        'modo_preparo' => 'nullable|string',
        'tempo_preparo' => 'nullable|integer|min:0',
        'rendimento' => 'nullable|string|max:255',
        'categoria' => 'nullable|string|max:255',
        'imagem' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
    ]);

    if ($request->hasFile('imagem')) {
        $path = $request->file('imagem')->store('uploads', 'public');
        $validated['imagem'] = $path;
    }

    $validated['ingredientes'] = trim($validated['ingredientes']);

    Receita::create($validated);

    return redirect()->route('receitas.index')->with('success', 'Receita criada com sucesso!');
}


public function show(Receita $receita)
{
    $ingredientesArray = array_map('trim', explode(',', $receita->ingredientes));

    return view('receitas.show', [
        'receita' => $receita,
        'ingredientesArray' => $ingredientesArray
    ]);
}


    public function edit($id)
    {
        $receita = Receita::findOrFail($id);
        return view('receitas.edit', compact('receita'));
    }

public function update(Request $request, Receita $receita)
{
    $validated = $request->validate([
        'titulo' => 'required|string|max:255',
        'descricao' => 'required|string',
        'ingredientes' => 'required|string',
        'modo_preparo' => 'nullable|string',
        'tempo_preparo' => 'nullable|integer|min:0',
        'rendimento' => 'nullable|string|max:255',
        'categoria' => 'nullable|string|max:255',
        'imagem' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    if ($request->hasFile('imagem')) {
        if ($receita->imagem && \Storage::disk('public')->exists($receita->imagem)) {
            \Storage::disk('public')->delete($receita->imagem);
        }

        $path = $request->file('imagem')->store('uploads', 'public');
        $validated['imagem'] = $path;
    }

    $validated['ingredientes'] = trim($validated['ingredientes']);

    $receita->update($validated);

    return redirect()->route('receitas.index')->with('success', 'Receita atualizada com sucesso!');
}


    public function destroy($id)
{
    $receita = Receita::findOrFail($id);

    if ($receita->imagem && Storage::disk('public')->exists($receita->imagem)) {
        Storage::disk('public')->delete($receita->imagem);
    }

    $receita->delete();

    return redirect()->route('receitas.index')->with('success', 'Receita excluída com sucesso!');
}
}
