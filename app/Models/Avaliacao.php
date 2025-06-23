<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avaliacao extends Model
{
    use HasFactory;
    protected $table = 'avaliacoes';

    protected $fillable = [
        'estudante_id',
        'curso_id',
        'comentario',
        'cc_1', 'cc_2', 'cc_3', 'cc_4', 'cc_5', 'cc_6', 'cc_7', 'cc_8', 'cc_9', 'cc_10', 'cc_11', 'cc_12', 'cc_13',
        'rc_1', 'rc_2', 'rc_3', 'rc_4', 'rc_5', 'rc_6', 'rc_7',
        'ag_1', 'ag_2', 'ag_3', 'ag_4', 'ag_5', 'ag_6', 'ag_7',
    ];

    public function estudante()
    {
        return $this->belongsTo(Estudante::class);
    }

    public function curso()
    {
    return $this->belongsTo(Curso::class, 'curso_id', 'id');
    }
}
