<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    protected $guarded = [];

    /**
     * 
     * Relationships
     * 
     */
    public function locations()
    {
        return $this->hasMany(Location::class);
    }
}
