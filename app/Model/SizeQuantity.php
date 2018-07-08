<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SizeQuantity extends Model
{
    protected $fillable = [
        'supply_id',
        'product_id',
        'size_id',
        'size_quantity',
        'last_quantity'
    ];

    public function sizeName()
    {
        return $this->belongsTo('App\Model\Size', 'size_id');
    }

}
