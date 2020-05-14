<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    protected $table = 'size';
    public $timestamps = false;

    public function product_size_color()
    {
        return $this->hasMany('App\models\productsizecolor', 'size_id', 'id');
    }
}
