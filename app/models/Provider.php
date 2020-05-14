<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    protected $table = 'provider';
    public $timestamps = false;

    public function product()
    {
        return $this->hasMany('App\models\product', 'provider_id', 'id');
    }
}
