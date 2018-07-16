<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['product_category_id', 'name', 'quantity', 'stock', 'delivery', 'remark'];

    public function category()
    {
    	return $this->belongsTo('App\Model\ProductCategory', 'product_category_id');
    }

    public function deliveryDate()
    {
        return $this->hasMany('App\Model\DeliveryDate', 'product_id', 'id');
    }
}
