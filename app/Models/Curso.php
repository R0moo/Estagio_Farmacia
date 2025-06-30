<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{   
    use HasFactory;
    

    protected $table = 'cursos';

    protected $fillable = [
        'titulo',
        'resumo',
        'vagas',
        'materiais',
        'carga_horaria',
        'data_inicio',
        'data_fim',
        'imagem',
        'projeto_id'
    ];

public function materiais(): HasMany
    {
        return $this->hasMany(Material::class, 'curso_id');
    }
    public function estudantes()
    {
        return $this->hasMany(Estudante::class);
    }

public function avaliacoes()
{
    return $this->hasMany(Avaliacao::class, 'curso_id', 'id');
}

    public function projeto()
    {
        return $this->belongsTo(Projeto::class);
    }
}
