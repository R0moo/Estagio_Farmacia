<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Projeto extends Model
{   
    use HasFactory;

    protected $table = 'projetos';

    protected $fillable = [
        'titulo',
        'descricao',
        'capa',
        'cor1',
        'cor2',
    ];

    public function postagens()
    {
        return $this->hasMany(Postagem::class);
    }
        public function cursos()
    {
        return $this->hasMany(Curso::class, 'projeto_id');
    }
}
