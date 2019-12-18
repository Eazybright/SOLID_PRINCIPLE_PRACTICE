<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(ProductTableSeeder::class);
        $this->call(StockTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(StocksTableSeeder::class);
    }
}
