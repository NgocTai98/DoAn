<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class color extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('color')->delete();
        DB::table('color')->insert([
            ['id'=>1,'value'=>'white'],
            ['id'=>2,'value'=>'Black'],
            ['id'=>3,'value'=>'Yellow'],
            ['id'=>4,'value'=>'Red'],
            ['id'=>5,'value'=>'Violet'],
            ['id'=>6,'value'=>'Pink'],
            ['id'=>7,'value'=>'Brown'],
            ['id'=>8,'value'=>'Green'],
            ['id'=>9,'value'=>'Blue'],
            ['id'=>10,'value'=>'Orange'],
            ['id'=>11,'value'=>'Gray'],
        ]);
    }
}
