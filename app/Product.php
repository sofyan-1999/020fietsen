<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'category_id',
        'image_id',
        'title',
        'description',
        'condition',
        'price',
        'home',
        'stock'
    ];

    public function orderProduct()
    {
        return $this->hasMany(OrderProduct::class);
    }

    public function image()
    {
        return $this->belongsTo(Picture::class);
    }
}
