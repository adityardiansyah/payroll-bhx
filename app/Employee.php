<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = ['nip','name','place_birth','date_birth', 'gender', 'position', 'salary', 'allowance', 'active'];
}
