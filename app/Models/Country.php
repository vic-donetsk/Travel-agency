<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    public function tours()
    {
        return $this->hasMany(Tour::class);
    }
    public function cities()
    {
        return $this->hasMany(City::class);
    }
}
