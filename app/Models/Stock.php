<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'quantity'
    ];

    /**
     * Get the product that owns Stock.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
