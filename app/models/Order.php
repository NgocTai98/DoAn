<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'order';
    public $timestamps = false;

    public function coupon(){
        return $this->belongsTo('App\models\coupon','coupon_id','id');
    }
    public function user_info(){
        return $this->belongsTo('App\models\userinfo','user_info_id','id');
    }

    public function order_item()
    {
        return $this->hasMany('App\models\orderitem', 'order_id', 'id');
    }
}
