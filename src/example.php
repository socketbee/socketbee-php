<?php

require 'vendor/autoload.php';

$app_id = getenv('APP_ID');
$secret = getenv('APP_SECRET');
$key = getenv('APP_KEY');

$eventSender = new \SocketBee\SocketBee($app_id, $secret, $key);
$s = $eventSender->sendEvent('cool_channel', 'new-message', 'very cool stufff!');

var_dump($s);