<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class family_composition extends Model
{
  protected $table = 'family_composition';
  protected $fillable = ['id', 
  						 'id_Identification_person',
  						 'name',
  						 'kinship',
  						 'Idade',
  						 'sex',
  						 'nis',
  						 'loas',
  						 'bolsaFamilia',
  						 'previdencia',
               'incomeUser',];
  
  public  $timestamps =false;


}
