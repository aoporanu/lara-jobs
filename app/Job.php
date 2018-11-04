<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static paginate(int $int)
 * @method static find($id)
 * @method static findOrFail($get)
 * @method static where()
 * @property mixed description
 * @property mixed title
 * @property mixed id
 * @property int company_id
 * @property mixed category_id
 */
class Job extends Model
{
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
