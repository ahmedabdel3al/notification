<?php

namespace App\Notification\Channel;


class SmsChannel
{
    public function send($notifiables, $notification)
    {
        return 'response';
    }
}
