<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * Used for  mass assignable & test purpose.
     *
     * @var array
     */
    protected $guarded = [];


    /**
     * The relationship about category and product tables
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products()
    {
        return $this->hasMany('App\Product');
    }
}
