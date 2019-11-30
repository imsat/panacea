<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * Used for  mass assignable & test purpose.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The relationship about product and category tables
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
