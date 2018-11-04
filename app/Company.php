<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Company
 * @property mixed cover
 * @property mixed slogan
 * @property mixed description
 * @property mixed name
 * @package App
 */
class Company extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'cover',
        'slogan',
        'description',
        'name'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function jobs()
    {
        return $this->hasMany(Job::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function inbox()
    {
        return $this->hasMany(Inbox::class);
    }
}
