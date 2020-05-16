<?php

namespace App\Event;

use App\Event\Classes\Event\NotificationSentEvent;
use App\Event\Classes\Listener\NotificationSentListener;

class EventDispatcher
{
    public $events  = [
        NotificationSentEvent::class => [
            NotificationSentListener::class
        ]
    ];
    public function dispatch($event)
    {
        foreach ($this->getListenerForEvent($event) as $listener) {
            (new $listener)->handle($event);
        }
    }

    public function getListenerForEvent($event)
    {
        if (!isset($this->events[get_class($event)])) {
            return [];
        }
        return $this->events[get_class($event)];
    }
}
