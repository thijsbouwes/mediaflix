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
        $this->belongsToMany(User::class)->withTimestamps();
    }
}
