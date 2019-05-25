<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $appends = ['tipo_usuario'];

    public function getTipoUsuarioAttribute()
    {
        switch ($this->user_type) {
            case 'T':
                return 'Técnico';
            case 'C':
                return 'Coordenador(a)';
            case 'A':
                return 'Assistente Social';
            case 'P':
                return 'Psicólogo(a)';
            case 'S':
                return 'Secretário(a)';
            default:
                return '';
        }
    }
}
