<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    protected $table = 'images';

    protected $fillable = [
        'first_original_image',
        'first_resized_image',
        'second_original_image',
        'third_original_image',
    ];
}
