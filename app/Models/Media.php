<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    public function main_img_tours()
    {
        return $this->hasMany(Tour::class, 'main_img_id');
    }

    public function tours()
    {
        return $this->belongsToMany(Media::class, 'tour_media', 'media_id', 'tour_id');
    }
}
