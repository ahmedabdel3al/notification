<?php

namespace App\Notification;

use App\Event\EventDispatcher;

class ChannelManager
{
    protected $drivers = [];
    public function send($notifiables, $notification)
    {
        (new NotificationSender(
            $this,
            new EventDispatcher
        ))->send($notifiables, $notification);
    }


    public function driver($driver = null)
    {
        $driver = $driver ?: $this->getDefaultDriver();

        if (is_null($driver)) {
            return null;
        }
        if (!isset($this->drivers[$driver])) {
            $this->drivers[$driver] = $this->createDriver($driver);
        }

        return $this->drivers[$driver];
    }

    public function createDriver($driver)
    {
        return new $driver;
    }
}
