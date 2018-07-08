<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable =  [
        'name',
        'designation',
        'department',
        'basic_salary',
        'phone',	
        'email',
        'nid',
        'present_address',	
        'permanent_address',	
        'image',
        'status'
    ];
}
