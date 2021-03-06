<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

//use App\Models\Hotel;
//use App\Models\Category;
//use App\Models\Type;
//use App\Models\Diet;
//use App\Models\Country;
//use App\Models\Media;
//use App\Models\Location;
//use App\Models\User;
//use App\Models\Order;
//use App\Models\Comment;


class Tour extends Model
{

    // чтобы все остальные поля были доступными для заполнения
    protected $guarded = ['created_at', 'updated_at'];

    protected $casts = [
        'started_at' => 'datetime',
        'finished_at' => 'datetime',
    ];

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
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

}
