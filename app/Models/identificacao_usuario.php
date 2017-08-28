<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class identificacao_usuario extends Model
{
    protected $table = 'identificacao_usuario';
  	protected $fillable = ['id', 
  						 'id_endereco',
  						 'id_situacao_financeira',
  						 'id_vulnerabilidade',
  						 'nome',
  						 'apelido',
  						 'data_nascimento',
  						 'certidao_nascimento',
  						 'NIS',
  						 'numero_rg',
  						 'data_emissao_rg',
  						 'uf_rg',
  						 'emissao_rg',
  						 'cpf',
  						 'deficiente',
  						 'deficiencia',
  						 'mae',
  						 'pai',
						 'estado_civil',
						 'escolaridade',
						 'data_inicial',
						 'data_final',  
  						 ];
  
 	 public  $timestamps =false;
}
