<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $guarded = [];

    /**
     * 
     * Relationships
     * 
    */
    public function region()
    {
        return $this->belongsTo(Region::class);
    }
}
