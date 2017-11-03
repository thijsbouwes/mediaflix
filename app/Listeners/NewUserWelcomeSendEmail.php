<?php

namespace App\Listeners;

use App\Mail\NewUserWelcome;
use Illuminate\Support\Facades\Mail;

class NewUserWelcomeSendEmail
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        Mail::to($event->user)->send(new NewUserWelcome($event->user));
    }
}
