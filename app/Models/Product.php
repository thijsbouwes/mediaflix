<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * Get the expenses for the product.
     */
    public function expenses()
    {
        return $this->hasMany(Expense::class);
    }

    /**
     * Get the stocks for the product.
     */
    public function stocks()
    {
        return $this->hasMany(Stock::class);
    }
}
