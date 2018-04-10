<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';
    protected $primaryKey = 'productId';

    public function prices()
    {
        return $this->hasMany('App\Price', 'productId','productId');
    }
    public function files()
    {
        return $this->hasMany('App\File', 'productId','productId');
    }
    public function schedules()
    {
        return $this->hasMany('App\Schedule', 'productId','productId');
    }
    public function itineraries()
    {
        return $this->hasMany('App\Itinerary', 'productId','productId');
    }
    public function activities()
    {
        return $this->belongsToMany('App\Activity', 'product_activity', 'productId', 'activityId');
    }
    public function destinations()
    {
        return $this->belongsToMany('App\Destination', 'product_destination', 'productId', 'destinationId');
    }
}
