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
        return strtolower($this->nivel) === strtolower($nivel);
    }

    public function isAdmin()
    {
        return $this->hasNivel('admin');
    }

    public function isModerator()
    {
        return $this->hasNivel('moderador');
    }

    public function isStudent()
    {
        return $this->hasNivel('estudante');
    }

    public function canAccessCourse($cursoId)
    {
        if ($this->isAdmin() || $this->isModerator()) {
        return true;
        }

        if ($this->isStudent()) {
            return optional($this->estudante)->curso_id == $cursoId;
        }

        return false;
    }

    public function hasAccessToCourse($cursoId): bool
{
    if ($this->isAdmin() || $this->isModerator()) {
        return true;
    }

    if (!$this->isStudent() || !$this->estudante) {
        return false;
    }
    return $this->estudante->curso_id == $cursoId;

}

public function checkCourseAccess($cursoId)
{
    $user = auth()->user();
    
    if ($user->isAdmin() || $user->isModerator()) {
        return true;
    }

    if ($user->isStudent()) {
        return $user->estudante && $user->estudante->curso_id == $cursoId;
    }

    return false;
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
