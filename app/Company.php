<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'company';
    protected $primaryKey = 'companyId';

    public function users()
    {
        return $this->hasMany('App\User', 'companyId','companyId');
    }

    public function products()
    {
        return $this->hasMany('App\Product', 'companyId','companyId');
    }
}
