<?php

use App\Models\User;

class UsersTableSeeder extends BaseSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 'admin')->create();
        factory(User::class, 'user', self::NUMBER_OF_RECORDS)->create();
    }
}
