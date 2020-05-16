<?php

namespace App\Notification;

use App\Event\Classes\Event\NotificationSentEvent;

class NotificationSender
{
    public $manager;
    public $eventDispatcher;
    public function __construct($manager, $eventDispatcher)
    {
        $this->manager = $manager;
        $this->eventDispatcher = $eventDispatcher;
    }
    public function send($notifiables, $notification)
    {
        $notifiables = $this->formatNotifiables($notifiables);
        foreach ($notification->via() as $channel) {
            $this->sendToNotifiable($notifiables, $notification, $channel);
        };
    }

    public function formatNotifiables($notifiables)
    {
        return $notifiables;
    }

    public function sendToNotifiable($notifiables, $notification, $channel)
    {

        //laravel set uinque key for notification if notification desont have id 
        $response = $this->manager->driver($channel)->send($notifiables, $notification);
        //fire notification that notification has been sent 
        $this->eventDispatcher->dispatch(new NotificationSentEvent($notification, $notifiables, $channel, $response));
    }
}
