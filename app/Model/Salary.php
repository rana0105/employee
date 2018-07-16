<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    protected $fillable = [
        'employee_id',
        'satffSalary',
        'date',
        'month',
        'year',
        'basic',
        'tifin',
        'over_time',
        'ot_taka',
        'abs_day',
        'abs_taka',
        'advanced',
        'total'
    ];

    public function employeeSalary()
    {
        return $this->belongsTo('App\Model\Employee', 'employee_id');
    }
}
