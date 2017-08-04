<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class attendance_daily extends Model
{
  protected $table = 'attendance_daily';

  protected $fillable = ['id', 'solicitation', 'transfer','result','service','technician','id_Identification_person',
 ,'data'];
  
  public  $timestamps = false;



}
