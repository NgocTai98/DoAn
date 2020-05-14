<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $table = 'coupon';
    public $timestamps = false;

    public function order()
    {
        return $this->hasMany('App\models\order', 'coupon_id', 'id');
    }
}
