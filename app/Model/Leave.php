<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    protected $fillable = [
        'employee_id',
        'from_date',
        'staffSta',
        'to_date',
        'reason'
    ];
    public function employeeInfo()
    {
        return $this->belongsTo('App\Model\Employee', 'employee_id');
    }
}
