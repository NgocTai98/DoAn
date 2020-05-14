<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class images extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('images')->delete();
        DB::table('images')->insert([
            ['id'=>1,'img'=>'uICpY4SWe.jpg','product_id'=> 1],
            ['id'=>2,'img'=>'XvUX6qFxR.jpg','product_id'=> 1],
            ['id'=>3,'img'=>'item-14.jpg','product_id'=> 2],
            ['id'=>4,'img'=>'person1.jpg','product_id'=> 3],
            ['id'=>5,'img'=>'person2.jpg','product_id'=> 4],
        ]);
    }
}
