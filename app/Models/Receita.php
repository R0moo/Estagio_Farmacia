<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receita extends Model
{
    use HasFactory;
    protected $table = 'receitas';

    protected $fillable = [
        'titulo',
        'descricao',
        'ingredientes',
        'modo_preparo',
        'tempo_preparo',
        'rendimento',
        'categoria',
        'imagem',
    ];
}
