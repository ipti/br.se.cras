<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class servico extends Model
{
    protected $table = 'service';
  	protected $fillable = ['id', 
  						 'nome',
  						 ];
  
 	 public  $timestamps =false;
}
