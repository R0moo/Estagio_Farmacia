<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Solicitacao;
use Illuminate\Support\Facades\Mail;
use App\Mail\InscricaoRejeitadaMail;
use App\Mail\InscricaoAprovadaMail;
use App\Models\Estudante;
use App\Models\User;
use App\Models\Curso;

class AdminController extends Controller
{
    public function solicitacoes()
{
    $solicitacoes = Solicitacao::with('curso')
        ->where('status', 'pendente')
        ->latest()
        ->get();
    
    return view('admin.solicitacoes.index', compact('solicitacoes'));
}

public function showSolicitacao(Solicitacao $solicitacao)
{
    return view('admin.solicitacoes.show', compact('solicitacao'));
}

public function aprovar(Solicitacao $solicitacao)
{
    $solicitacao->update(['status' => 'aprovado']);

    $user = User::create([
        'name' => $solicitacao->nome,
        'email' => $solicitacao->email,
        'password' => bcrypt($solicitacao->cpf),
        'nivel' => 'estudante'
    ]);

    Estudante::create([
        'user_id' => $user->id,
        'nome' => $solicitacao->nome,
        'email' => $solicitacao->email,
        'cpf' => $solicitacao->cpf,
        'ocupacao' => $solicitacao->ocupacao,
        'curso_id' => $solicitacao->curso_id
    ]);

    
    
    $curso = Curso::findOrFail($solicitacao->curso);
    Mail::to($solicitacao->email)->send(new InscricaoAprovadaMail($curso));
    
    return redirect()->route('admin.solicitacoes')->with('success', 'Inscrição aprovada com sucesso!');
}

public function rejeitar(Solicitacao $solicitacao)
{
    $solicitacao->update(['status' => 'rejeitado']);

    $curso = Curso::findOrFail($solicitacao->curso);
    Mail::to($solicitacao->email)->send(new InscricaoRejeitadaMail($curso));
    
    return redirect()->route('admin.solicitacoes')->with('success', 'Inscrição rejeitada com sucesso!');
}
}
