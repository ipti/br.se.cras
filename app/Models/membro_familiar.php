<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class membro_familiar extends Model
{
  protected $table = 'membro_familiar';
  protected $fillable = ['id', 
  						 'id_identificacao_usuario',
  						 'nome',
  						 'parentesco',
  						 'idade',
  						 'sexo',
  						 'nis',
  						 'loas',
  						 'bolsaFamilia',
  						 'previdencia',
              			 'renda',];
  
  public  $timestamps =false;


}
