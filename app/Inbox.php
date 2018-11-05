<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Inbox
 *
 * @property mixed from
 * @property mixed to
 * @property mixed body
 * @package App
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Company $company
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inbox whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inbox whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Inbox whereUpdatedAt($value)
 * @mixin \Eloquent
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
