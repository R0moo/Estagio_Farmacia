<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitacao extends Model
{
    use HasFactory;

    protected $table = 'solicitacoes';

    protected $fillable = [
        'curso_id',
        'nome',
        'cpf',
        'email',
        'ocupacao',
        'status'
    ];

    public function curso(){
        return $this->belongsTo(Curso::class);
    }
}
