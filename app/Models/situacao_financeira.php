<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class situacao_financeira extends Model
{
    protected $table = 'situacao_financeira';
  	protected $fillable = [
  						 'profissao',
  						 'renda',
  						 'reside_familia',
  						 'bolsa_familia',
  						 'loasbpc',
  						 'previdencia',
          			     'carteira_assinada',
  						 ];
  
 	 public  $timestamps =false;
}
