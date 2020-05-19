<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'category_id',
        'title',
        'description',
        'condition',
        'price',
        'image',
        'home'
    ];
}
