<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WarrantyProduct extends Model
{
    /**
     * Used for  mass assignable & test purpose.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * @var array
     * It will be automatically wrap in Carbon.
     */
    protected $dates = ['warranty_start_date', 'warranty_end_date'];


    /**
     * The relationship about warrantyProduct and product tables
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo('App\Product');
    }


    /**
     * The relationship about warrantyProduct and user tables
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Return formatted Warranty End Date
     *
     * @param $date
     * @return mixed
     */
    public function getWarrantyStartDateAttribute($date)
    {
        return date('d-m-Y', strtotime($date));
    }

    /**
     * Return formatted Warranty Start Date
     *
     * @param $date
     * @return mixed
     */
    public function getWarrantyEndDateAttribute($date)
    {
        return date('d-m-Y', strtotime($date));
    }
}
