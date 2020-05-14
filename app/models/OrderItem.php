<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $table = 'order_item';
    public $timestamps = false;

    public function order(){
        return $this->belongsTo('App\models\order','order_id','id');
    }
    public function product_size_color(){
        return $this->belongsTo('App\models\productsizecolor','product_size_color_id','id');
    }
}
