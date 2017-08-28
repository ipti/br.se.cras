<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class vulnerabilidade extends Model
{
    protected $table = 'vulnerabilidade';
  	protected $fillable = ['id', 
  						 'ocupacao_irregular',
  						 'crianca_sozinha',
  						 'idosos_dependentes',
  						 'desempregados',
  						 'deficientes',
  						 'baixa_renda',
  						 'outros',
  						 ];
  
 	 public  $timestamps =false;
}
