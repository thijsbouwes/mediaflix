<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{

    /**
     * Get all the users for the Event.
     */
    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    /**
     * Get the expenses for the product.
     */
    public function expenses()
    {
        return $this->hasMany(Expense::class);
    }
}
