<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';
    public $timestamps = false;
    public function category(){
        return $this->belongsTo('App\models\category','category_id','id');
    }
    public function provider(){
        return $this->belongsTo('App\models\provider','provider_id','id');
    }


    public function image()
    {
        return $this->hasMany('App\models\image', 'product_id', 'id');
    }
    public function product_size_color()
    {
        return $this->hasMany('App\models\productsizecolor', 'product_id', 'id');
    }
}
