<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class address extends Model
{
    protected $table = 'address';
  	protected $fillable = ['id', 
  						 'phone',
  						 'address',
  						 'reference_point',
  						 'conditions_home',
  						 'type_construct',
  						 'rooms',
  						 'value_home',
  						 ];
  
 	 public  $timestamps =false;
}
