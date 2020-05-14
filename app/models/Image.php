<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'images';
    public $timestamps = false;

    public function product(){
        return $this->belongsTo('App\models\product','product_id','id');
    }
}
