<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Category
 * @property mixed name
 * @package App
 */
class Category extends Model
{
    protected $fillable = [
        'name'
    ];
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function jobs()
    {
        return $this->hasMany(Job::class);
    }
}
