<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Order extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code');
            $table->integer('total');
            $table->integer('state');
            $table->string('address');
            $table->string('phone');
            $table->string('couponCode');
            $table->integer('couponSale');
            $table->integer('coupon_id')->unsigned();
            $table->foreign('coupon_id')->references('id')->on('coupon')->onDelete('cascade');
            $table->integer('user_info_id')->unsigned();
            $table->foreign('user_info_id')->references('id')->on('user_info')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order');
    }
}
