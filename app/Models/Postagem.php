<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Postagem extends Model
{   
    use SoftDeletes;
    use HasFactory;
    

     protected $table = 'postagens';

    protected $fillable = [
        'titulo',
        'descricao',
        'foto',
        'projeto_id',
    ];

    public function projeto()
    {
        return $this->belongsTo(Projeto::class);
    }

    public function imagens()
    {
    return $this->hasMany(PostagemImagem::class);
    }
}
