<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SupplyDate extends Model
{
    protected $fillable = ['supply_id', 'supply_date', 'size_id', 'supply_quantity', 'delivery_no'];

    public function namesize()
    {
        return $this->belongsTo('App\Model\Size', 'size_id');
    }
}
