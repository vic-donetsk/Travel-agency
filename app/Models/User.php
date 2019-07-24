<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Tour;
use App\Models\Deal;
use App\Models\Comment;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{   
    use Notifiable;
    
    // для системы Auth
    protected $fillable = ['email', 'password'];

    public function tours()
    {
        return $this->hasMany(Tour::class, 'seller_id');
    }

    public function deal_buyer()
    {
        return $this->hasMany(Deal::class, 'buyer_id');
    }

    public function deal_seller()
    {
        return $this->hasMany(Deal::class, 'seller_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'user_id');
    }
}
