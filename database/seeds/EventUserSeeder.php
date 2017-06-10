<?php

use App\Models\EventUser;

class EventUserSeeder extends BaseSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(EventUser::class, self::NUMBER_OF_RECORDS)->create();
    }
}
