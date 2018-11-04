<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Inbox
 * @property mixed from
 * @property mixed to
 * @property mixed body
 * @package App
 */
class Inbox extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'from',
        'to',
        'body'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
