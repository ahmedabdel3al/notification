<?php

namespace App\Event\Classes\Event;

class NotificationSentEvent
{

    public $notification, $notifiables, $channel, $response;
    public function __construct($notification, $notifiables, $channel, $response)
    {
        $this->notification = $notification;
        $this->notifiables = $notifiables;
        $this->channel = $channel;
        $this->response = $response;
    }
}
