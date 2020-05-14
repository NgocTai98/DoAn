<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    protected $table = 'user_info';
    // public $timestamps = false;

    public function order()
    {
        return $this->hasMany('App\models\order', 'user_info_id', 'id');
    }
}
