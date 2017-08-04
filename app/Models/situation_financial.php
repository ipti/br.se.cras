<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class situation_financial extends Model
{
    protected $table = 'situation_financial';
  	protected $fillable = [
  						 'profession',
  						 'income_family',
  						 'family_reside',
  						 // 'family_benefits_value',
  						 'bolsa_familia',
  						 'loasbpc',
  						 'previdencia',
               'wallet_signed'

  						 ];
  
 	 public  $timestamps =false;
}
