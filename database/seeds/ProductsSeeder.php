<?php

use App\Models\Product;

class ProductsSeeder extends BaseSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Product::class, self::NUMBER_OF_RECORDS)->create();
    }
}
