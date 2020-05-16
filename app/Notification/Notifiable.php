<?php

namespace App\Notification;

use App\Notification\Contract\Notification;

trait Notifiable
{

    public function notify(Notification $notification)
    {
        return (new ChannelManager())->send($this, $notification);
    }
}
