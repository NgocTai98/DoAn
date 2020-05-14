<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class ProductSizeColor extends Model
{
    protected $table = 'product_size_color';
    public $timestamps = false;

    public function size(){
        return $this->belongsTo('App\models\size','size_id','id');
    }
    public function color(){
        return $this->belongsTo('App\models\color','color_id','id');
    }
    public function product(){
        return $this->belongsTo('App\models\product','product_id','id');
    }

    public function order_item()
    {
        return $this->hasMany('App\models\orderitem', 'order_id', 'id');
    }
}
