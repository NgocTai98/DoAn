<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class product extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product')->delete();
        DB::table('product')->insert([
            ['id'=>1,'productCode'=>'SP01','productName'=> 'Áo phông nam','productPrice'=>100000,'info'=>'Áo nam đẹp','description'=>'Đồ thời trang đẹp','category_id'=>2,'provider_id'=>1],
            ['id'=>2,'productCode'=>'SP02','productName'=> 'Áo Phông nữ','productPrice'=>200000,'info'=>'Áo nữ đẹp','description'=>'Đồ thời trang đẹp','category_id'=>6,'provider_id'=>2],
            ['id'=>3,'productCode'=>'SP03','productName'=> 'Quân Nam','productPrice'=>300000,'info'=>'Quần nam đẹp','description'=>'Đồ thời trang đẹp','category_id'=>3,'provider_id'=>3],
            ['id'=>4,'productCode'=>'SP04','productName'=> 'Quần nữ','productPrice'=>400000,'info'=>'Quần nữ đẹp','description'=>'Đồ thời trang đẹp','category_id'=>7,'provider_id'=>4],
        ]);
    }
}
