<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class orderitem extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('order_item')->delete();
        DB::table('order_item')->insert([
            ['order_id'=>1,'product_size_color_id'=> 1,'price'=>100000,'total'=>2],
            ['order_id'=>2,'product_size_color_id'=> 1,'price'=>100000,'total'=>1],
            ['order_id'=>2,'product_size_color_id'=> 2,'price'=>200000,'total'=>1],
            ['order_id'=>3,'product_size_color_id'=> 3,'price'=>100000,'total'=>1],
            ['order_id'=>4,'product_size_color_id'=> 4,'price'=>100000,'total'=>1],
        ]);
    }
}
