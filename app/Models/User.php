<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
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
}
