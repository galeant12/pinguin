<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    protected $table = 'price';
    protected $primaryKey = 'priceId';

    public function product()
    {
        return $this->belongTo('App\Proce', 'productId','productId');
    }

}
