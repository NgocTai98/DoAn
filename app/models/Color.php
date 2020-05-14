<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    protected $table = 'color';
    public $timestamps = false;

    public function product_size_color()
    {
        return $this->hasMany('App\models\productsizecolor', 'color_id', 'id');
    }
}
