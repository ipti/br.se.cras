<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class endereco extends Model
{
    protected $table = 'endereco';
  	protected $fillable = ['id', 
  						 'telefone',
  						 'endereco',
  						 'ponto_referencia',
  						 'condicoes_moradia',
  						 'tipo_construcao',
  						 'comodos',
  						 'valor_aluguel',
  						 ];
  
 	 public  $timestamps =false;
}
