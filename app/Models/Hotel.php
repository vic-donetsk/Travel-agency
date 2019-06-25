<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Tour;


class Hotel extends Model
{
    public function tours()
    {
        return $this->hasMany(Tour::class);
    }
}
