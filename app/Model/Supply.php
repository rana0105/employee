<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class Supply extends Model
{
    protected $fillable = [
        'product_id',
        'buyer_name',
        'reference_no',
        'order_no',
        'color',
        'order_quantity',
        'size',
        'from_date',
        'to_date',
        'supply_date'
    ];
    public function products()
    {
        return $this->belongsTo('App\Model\Product', 'product_id');
    }
    public function supplydate()
    {
        return $this->hasMany('App\Model\SupplyDate', 'supply_id', 'id');
    }

    public function quantity()
    {
        return $this->hasMany('App\Model\SizeQuantity', 'supply_id', 'id');
    }

}
