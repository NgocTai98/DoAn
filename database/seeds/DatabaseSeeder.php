<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(users::class);
        $this->call(userinfo::class);
        $this->call(category::class);
        $this->call(size::class);
        $this->call(color::class);
        $this->call(provider::class);
        $this->call(coupon::class);
        $this->call(product::class);
        $this->call(productsizecolor::class);
        $this->call(images::class);
        $this->call(order::class);
        $this->call(orderitem::class);
    }
}
