<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';
    protected $primaryKey = 'productId';

    public function companies()
    {
        return $this->belongsTo('App\Company', 'companyId','companyId');
    }

    public function prices()
    {
        return $this->hasMany('App\Price', 'productId','productId');
    }
}
