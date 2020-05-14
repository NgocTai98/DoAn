<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class provider extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('provider')->delete();
        DB::table('provider')->insert([
            ['id'=>1,'name'=>'cty thời trang Nam Anh','address'=> '123 quận Tân Bình, tp.HCM','phone'=>'01234567','info'=>'Chuyên về hàng áo phông'],
            ['id'=>2,'name'=>'Thời trang công sở An An','address'=> '65 Tân Triều, Thanh Xuân, Hà Nội','phone'=>'3437848484','info'=>'Chuyên về đồ công sở'],
            ['id'=>3,'name'=>'May mặc Việt Nam','address'=> '18 Lạch Tray, Hải Phòng','phone'=>'263443747474','info'=>'Hàng Việt Nam xuất khẩu'],
            ['id'=>4,'name'=>'Thời trang xuất khẩu Minh Phú','address'=> '567 Cẩm Phả, Hạ Long, Quảng Ninh','phone'=>'2346376373','info'=>'Hàng Quảng Châu F1'],
        ]);
    }
}
