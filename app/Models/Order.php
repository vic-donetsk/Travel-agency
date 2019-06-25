<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Tour;
use App\Models\Deal;


class Order extends Model
{
    public function tour()  
    {
    	return $this->belongsTo(Tour::class);
    }

    public function deal()  
    {
    	return $this->belongsTo(Deal::class);
    }
}
