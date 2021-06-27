<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AttendanceAbsense extends Model
{
    protected $fillable = ['employee_id','date_start','date_end','code','description','file','flag_verified'];
}
