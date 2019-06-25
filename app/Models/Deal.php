<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Order;


class Deal extends Model
{
    public function seller()  
    {
    	return $this->belongsTo(User::class, 'seller_id');
    }

    public function buyer()  
    {
    	return $this->belongsTo(User::class, 'buyer_id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
