<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * Os atributos que podem ser atribuídos em massa.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'nivel'
    ];
    public function estudante(){
        return $this->hasOne(Estudante::class);
    }
public function hasNivel($nivel)
{
    return $this->nivel == $nivel;
}

public function isAdmin()
{
    return $this->nivel === 'admin';
}

public function isModerator()
{
    return $this->nivel === 'moderador';
}

public function isStudent()
{
    return $this->nivel === 'estudente';
}


    /**
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
