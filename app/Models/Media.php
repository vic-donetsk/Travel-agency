<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\Tour;

class Media extends Model
{
	protected $fillable = ['path'];

    public function main_img_tours()
    {
        return $this->hasMany(Tour::class, 'main_img_id');
    }

    public function tours()
    {
        return $this->belongsToMany(Tour::class, 'tour_media', 'media_id', 'tour_id');
    }
}
