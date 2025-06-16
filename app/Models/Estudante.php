<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudante extends Model
{
    use HasFactory;
        protected $table = 'estudantes';

    protected $fillable = [
        'user_id',
        'curso_id',
        'nome',
        'cpf',
        'email',
        'ocupacao',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function curso(){
        return $this->belongsTo(Curso::class);
    }

    public function avaliacoes(){
        return $this->hasMany(Avaliacao::class);
    }
}
