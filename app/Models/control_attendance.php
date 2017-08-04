<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class control_attendance extends Model
{
  protected $table = 'control_attendance';
  protected $fillable = ['id_identification_PersonÍndice', 
  						 'date',
  						 'id_service',
  						 'solicitation',
  						 'providence',
  						 'result',
  						 'id_technician',];
  
  public  $timestamps =false;
}
