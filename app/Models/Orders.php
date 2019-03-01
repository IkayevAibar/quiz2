<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Item;

class Orders extends Model
{
    public $table = "orders";

    public function user()
    {
        return $this->hasMany('App\User', 'user_id');
    }
    public function item()
    {
        return $this->hasMany('App\Models\Item', 'id');
    }
}

