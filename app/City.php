<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = [
        'name',
        'country_id'
    ];

    public function jobs()
    {
        return $this->hasMany(Job::class);
    }
}
