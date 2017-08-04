<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class technician extends Model
{
     protected $table = 'technician';
  	protected $fillable = ['id', 
  						 'name',
  						 ];
  
 	 public  $timestamps =false;
}
