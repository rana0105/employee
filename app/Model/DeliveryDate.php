<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class DeliveryDate extends Model
{
    protected $fillable = ['product_id', 'delivery_date', 'delivery_quantity'];
}
