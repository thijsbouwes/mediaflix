<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    /**
     * Get the Event that owns the Expense.
     */
    public function events()
    {
        return $this->belongsTo(Event::class);
    }

    /**
     * Get the product that owns Expense.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
