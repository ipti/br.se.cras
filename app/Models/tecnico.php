<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tecnico extends Model
{
     protected $table = 'tecnico';
  	protected $fillable = ['id', 
  						 'nome',
  						 ];
  
 	 public  $timestamps =false;
}
