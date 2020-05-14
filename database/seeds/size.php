<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class size extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('size')->delete();
        DB::table('size')->insert([
            ['id'=>1,'value'=>'XS'],
            ['id'=>2,'value'=>'S'],
            ['id'=>3,'value'=>'M'],
            ['id'=>4,'value'=>'L'],
            ['id'=>5,'value'=>'XL'],
        ]);
    }
}
