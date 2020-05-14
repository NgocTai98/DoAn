<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class order extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('order')->delete();
        DB::table('order')->insert([
            ['id'=>1,'code'=>'4834','total'=> 200000,'state'=>0,'address'=>'68 cầu giấy, Hà Nội','phone'=>'26262626','couponCode'=>'SALEOFF10','couponSale'=>20000,'coupon_id'=>1,'user_info_id'=>1],
            ['id'=>2,'code'=>'5474','total'=> 300000,'state'=>0,'address'=>'19 Hoàng Cầu, Hà Nội','phone'=>'48484844','couponCode'=>'SALEOFF20','couponSale'=>60000,'coupon_id'=>1,'user_info_id'=>2],
            ['id'=>3,'code'=>'2322','total'=> 400000,'state'=>1,'address'=>'567 Quang Trung, Hải Phòng','phone'=>'345737723','couponCode'=>'DISCOUNT50','couponSale'=>50000,'coupon_id'=>1,'user_info_id'=>3],
            ['id'=>4,'code'=>'6585','total'=> 500000,'state'=>0,'address'=>'123 Hạ Long, Quảng Ninh','phone'=>'573737357','couponCode'=>'DISCOUNT50','couponSale'=>50000,'coupon_id'=>1,'user_info_id'=>4],
        ]);
    }
}
