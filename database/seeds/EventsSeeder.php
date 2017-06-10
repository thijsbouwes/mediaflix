<?php

use App\Models\Event;

class EventsSeeder extends BaseSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Event::class, self::NUMBER_OF_RECORDS)->create();
    }
}
