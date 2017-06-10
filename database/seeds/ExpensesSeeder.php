<?php

use App\Models\Expense;

class ExpensesSeeder extends BaseSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Expense::class, self::NUMBER_OF_RECORDS)->create();
    }
}
