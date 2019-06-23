<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    public function city()  
    {
    	return $this->belongsTo(City::class);
    }
    public function tours()
    {
        return $this->hasMany(Tour::class, 'start_location_id');
    }
}
