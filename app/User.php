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
            case '1':
                return 'Administrador';
            case '2':
                return 'Auxiliar administrativo';
            case '3':
                return 'Técnico de nível superior';
            case '4':
                return 'Coordenador(a)';
            case '5':
                return 'Operador Cadastro Único';
            default:
                return '';
        }
    }
}
