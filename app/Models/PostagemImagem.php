<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostagemImagem extends Model
{
    protected $table = 'postagem_imagens';
    protected $fillable = ['postagem_id', 'caminho', 'legenda'];

    public function postagem()
    {
        return $this->belongsTo(Postagem::class);
    }
}
