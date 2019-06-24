<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    public function hotel()  
    {
    	return $this->belongsTo(Hotel::class);
    }
    public function category()  
    {
    	return $this->belongsTo(Category::class);
    }
    public function type()  
    {
    	return $this->belongsTo(Type::class);
    }
    public function diet()  
    {
    	return $this->belongsTo(Diet::class);
    }
    public function country()  
    {
    	return $this->belongsTo(Country::class);
    }
    public function main_img()  
    {
    	return $this->belongsTo(Media::class, 'main_img_id');
    }
    public function start_location()  
    {
    	return $this->belongsTo(Location::class, 'start_location_id');
    }
    public function seller()  
    {
    	return $this->belongsTo(User::class, 'seller_id');
    }

    public function media()
    {
        return $this->belongsToMany(Media::class, 'tour_media', 'tour_id', 'media_id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
