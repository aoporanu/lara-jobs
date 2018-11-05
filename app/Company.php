<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Company
 *
 * @property mixed cover
 * @property mixed slogan
 * @property mixed description
 * @property mixed name
 * @package App
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $cover
 * @property string|null $slogan
 * @property string $description
 * @property int|null $user_id
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Inbox[] $inbox
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Job[] $jobs
 * @property-read \App\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Company whereCover($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Company whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Company whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Company whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Company whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Company whereSlogan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Company whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Company whereUserId($value)
 * @mixin \Eloquent
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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
