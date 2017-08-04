<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class vulnerabilities extends Model
{
    protected $table = 'vulnerabilities';
  	protected $fillable = ['id', 
  						 'irregular_ocupation',
  						 'children_alone',
  						 'dependent_elderly',
  						 'unemployment',
  						 'deficient_family',
  						 'lowIcome',
  						 'others',
  						 ];
  
 	 public  $timestamps =false;
}
