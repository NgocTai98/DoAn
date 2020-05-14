<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        DB::table('users')->insert([
            ['id'=>1,'email'=>'admin@gmail.com','password'=> Hash::make('123456'),'fullname'=>'Admin','age'=>18,'sex'=>'nam','level'=>1],
            ['id'=>2,'email'=>'zimpro@gmail.com','password'=> Hash::make('123456'),'fullname'=>'Zimpro','age'=>19,'sex'=>'nữ','level'=>2],
            ['id'=>3,'email'=>'ngoctai1908@gmail.com','password'=> Hash::make('tai123'),'fullname'=>'Ngọc Tài','age'=>22,'sex'=>'nam','level'=>1],
            ['id'=>4,'email'=>'zimpro9x@gmail.com','password'=> Hash::make('123456'),'fullname'=>'Zimpro9x','age'=>20,'sex'=>'nữ','level'=>2],
        ]);
    }
}
