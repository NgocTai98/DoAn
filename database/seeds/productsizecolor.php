<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class productsizecolor extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_size_color')->delete();
        DB::table('product_size_color')->insert([
            ['id'=>1,'size_id'=>1,'color_id'=> 1,'product_id'=>1,'quantity'=>5],
            ['id'=>2,'size_id'=>2,'color_id'=> 1,'product_id'=>1,'quantity'=>5],
            ['id'=>3,'size_id'=>3,'color_id'=> 1,'product_id'=>1,'quantity'=>4],
            ['id'=>4,'size_id'=>1,'color_id'=> 2,'product_id'=>2,'quantity'=>3],
            ['id'=>5,'size_id'=>2,'color_id'=> 3,'product_id'=>2,'quantity'=>4],
            ['id'=>6,'size_id'=>2,'color_id'=> 4,'product_id'=>3,'quantity'=>4],
            ['id'=>7,'size_id'=>2,'color_id'=> 5,'product_id'=>4,'quantity'=>0],
        ]);
    }
}
