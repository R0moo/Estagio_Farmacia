<?php

namespace App\Http\Controllers;

use App\Models\Projeto;
use Illuminate\Http\Request;
use App\Models\Estudante;
use App\Models\Curso;
use App\Models\User;

class EstudanteController extends Controller
{
    public function index()
    {
        $estudantes = Estudante::all();
        return view('estudantes.index', compact('estudantes'));
    }

    public function create(Projeto $projeto, Curso $curso)
    {
        return view('projetos.cursos.estudantes.create', compact('projeto', 'curso'));
    }

    public function store(Request $request, Projeto $projeto, Curso $curso)
    {
    $validated = $request->validate([
        'nome' => 'required',
        'cpf' => 'required|unique:estudantes',
        'email' => 'required|email|unique:estudantes',
        'curso_id' => 'required|exists:cursos,id',
        'ocupacao' => 'required'
    ]);

    $user = User::create([
        'name' => $validated['nome'],
        'email' => $validated['email'],
        'password' => bcrypt($validated['cpf']),
        'nivel' => 'estudante'
    ]);

    $user->estudante()->create([
        'curso_id' => $validated['curso_id'],
        'nome' => $validated['nome'],
        'cpf' => $validated['cpf'],
        'email' => $validated['email'],
        'ocupacao' => $validated['ocupacao']
    ]);


    return redirect()->route('projetos.cursos.show', ['projeto' => $projeto->id, 'curso'=> $curso->id])->with('success', 'Estudante criado com sucesso!');
    }

    public function edit($id)
    {
        $estudante = Estudante::findOrFail($id);
        return view('estudantes.edit', compact('estudante'));
    }

    public function update(Request $request, $id)
    {
        $estudante = Estudante::findOrFail($id);
        $estudante->update($request->all());
        return redirect()->route('estudantes.index')->with('success', 'Estudante atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $estudante = Estudante::findOrFail($id);
        $estudante->delete();
        return redirect()->route('projetos.cursos.show')->with('success', 'Estudante removido com sucesso!');
    }
}
