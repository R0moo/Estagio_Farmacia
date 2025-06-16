<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Avaliacao;

class AvaliacaoController extends Controller
{
    public function index()
    {
        $avaliacoes = Avaliacao::all();
        return view('avaliacoes.index', compact('avaliacoes'));
    }

    public function create()
    {
        return view('avaliacoes.create');
    }

    public function store(Request $request)
    {
        Avaliacao::create($request->all());
        return redirect()->route('avaliacoes.index')->with('success', 'Avaliação criada com sucesso!');
    }

    public function show($id)
    {
        $avaliacao = Avaliacao::findOrFail($id);
        return view('avaliacoes.show', compact('avaliacao'));
    }

    public function edit($id)
    {
        $avaliacao = Avaliacao::findOrFail($id);
        return view('avaliacoes.edit', compact('avaliacao'));
    }

    public function update(Request $request, $id)
    {
        $avaliacao = Avaliacao::findOrFail($id);
        $avaliacao->update($request->all());
        return redirect()->route('avaliacoes.index')->with('success', 'Avaliação atualizada com sucesso!');
    }

    public function destroy($id)
    {
        $avaliacao = Avaliacao::findOrFail($id);
        $avaliacao->delete();
        return redirect()->route('avaliacoes.index')->with('success', 'Avaliação removida com sucesso!');
    }
}
