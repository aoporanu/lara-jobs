<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inbox extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
