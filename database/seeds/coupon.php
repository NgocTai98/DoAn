<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class coupon extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('coupon')->delete();
        DB::table('coupon')->insert([
            ['id'=>1,'couponCode'=>'SALEOFF10','sale'=> 10,'type'=>'percent','totalCoupon'=>50],
            ['id'=>2,'couponCode'=>'SALEOFF20','sale'=> 20,'type'=>'percent','totalCoupon'=>60],
            ['id'=>3,'couponCode'=>'DISCOUNT50','sale'=> 50000,'type'=>'discount','totalCoupon'=>70],
            ['id'=>4,'couponCode'=>'DISCOUNT100','sale'=> 100000,'type'=>'discount','totalCoupon'=>80],
        ]);
    }
}
