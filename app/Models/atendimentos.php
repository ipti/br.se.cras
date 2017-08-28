<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class atendimentos extends Model
{
  protected $table = 'atendimentos';

  protected $fillable = ['id',
                        'solicitacao',
                        'encaminhamento',
                        'resultado',
                        'servico',
                        'tecnico',
                        'id_identificacao_usuario',
                        'data',
                        'id_membro_familiar'];         
  public  $timestamps = false;



}
