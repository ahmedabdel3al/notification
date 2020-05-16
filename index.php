<?php

use App\Model\User;
use App\Notification\Classes\SmsNotification;

require_once __DIR__ . '/vendor/autoload.php';


$user = new User;
$user->notify(new SmsNotification);
