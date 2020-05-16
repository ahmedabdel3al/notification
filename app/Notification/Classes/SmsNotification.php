<?php

namespace App\Notification\Classes;

use App\Notification\Channel\SmsChannel;
use App\Notification\Contract\Notification;

class SmsNotification implements Notification
{

    public function via()
    {
        return [SmsChannel::class];
    }
    public function toSms()
    {
        return 'ddndd message';
    }
}
