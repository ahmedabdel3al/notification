<?php

namespace App\Event\Classes\Listener;

class NotificationSentListener
{

    public function handle($event)
    {
        dd($event, 'in handle');
    }
}
