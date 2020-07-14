<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = 'addresses';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'city', 'zipcode', 'street', 'street_number',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
