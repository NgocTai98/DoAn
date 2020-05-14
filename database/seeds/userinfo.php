<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class userinfo extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_info')->delete();
        DB::table('user_info')->insert([
            ['id'=>1,'email'=>'ngoctai1908@gmail.com','address'=>'68 Cầu giấy Hà Nội','phone'=> '26262626','fullname'=>'Ngọc Tài'],
            ['id'=>2,'email'=>'jackiechan1908@gmail.com','address'=>'19 Hoàng Cầu, Hà Nội','phone'=> '48484844','fullname'=>'Công Dương'],
            ['id'=>3,'email'=>'vananh@gmail.com','address'=>'567 Quang Trung, Hải Phòng','phone'=> '345737723','fullname'=>'Vân Anh'],
            ['id'=>4,'email'=>'ngocthuy@gmail.com','address'=>'123 Hạ Long, Quảng Ninh','phone'=> '573737357','fullname'=>'Ngọc Thùy'],
        ]);
    }
}
