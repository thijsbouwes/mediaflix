<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    /**
     * Get the product that owns Stock.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
