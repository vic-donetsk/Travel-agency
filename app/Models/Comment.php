<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Tour;

class Comment extends Model
{
     public function user()  
    {
    	return $this->belongsTo(User::class);
    }
    public function tour()  
    {
    	return $this->belongsTo(Tour::class);
    }
}
