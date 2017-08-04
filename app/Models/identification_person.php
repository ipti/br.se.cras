<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class identification_person extends Model
{
    protected $table = 'Identification_person';
  	protected $fillable = ['id', 
  						 'id_address',
  						 'id_situation_Financial',
  						 'id_Vulnerabilities',
  						 'name',
  						 'nick_name',
  						 'birth',
  						 'NIS',
  						 'rg_number',
  						 'rg_emission_date',
  						 'rg_UF',
  						 'rg_emission_organ	',
  						 'cpf',
  						 'deficient',
  						 'deficient_type',
  						 'mother',
  						 'father',
  						 'situation',
  						 'schooling',
  						 ];
  
 	 public  $timestamps =false;
}
