<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model

{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'Brand', 'Name', 'Price', 'Gender','Image'
    ];
    public $table = "items";
    public function getRouteKeyName()
    {
        return 'hash';
    }
    public function orders(){
        return $this->hasMany('App\Models\Orders');
    }

}
