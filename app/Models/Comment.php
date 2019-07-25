<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Tour;

class Comment extends Model
{

	protected $fillable = ['tour_id', 'author_name', 'author_email', 'content'];
    public function tour()  
    {
    	return $this->belongsTo(Tour::class);
    }
}
