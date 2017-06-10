<?php

use App\Models\Stock;

class StocksSeeder extends BaseSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Stock::class, NUMBER_OF_RECORDS)->create();
    }
}
