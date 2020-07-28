<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    protected $table = 'orders_products';

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
