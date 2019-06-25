<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Country;
use App\Models\Location;


class City extends Model
{
    public function country()  
    {
    	return $this->belongsTo(Country::class);
    }

    public function locations()
    {
        return $this->hasMany(Location::class);
    }
}
