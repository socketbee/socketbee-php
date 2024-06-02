## SocketBee PHP library

[SocketBee](https://socketbee.com) provides an easy-to-use API for sending real-time events to your applications. This PHP SDK enables you to interact with the SocketBee service effortlessly.

## Installation

To use the SocketBee SDK in your PHP project, you can install it via Composer. Run the following command in your project directory:

```bash
composer require socketbee/socketbee
```

## Usage

Here's a step-by-step guide on how to use the SocketBee PHP SDK:

### Step 1: Load the Composer Autoloader

Ensure the Composer autoloader is included in your script:

```php
require 'vendor/autoload.php';
```

### Step 2: Initialize the SocketBee Client

Create an instance of the `SocketBee` class with your application ID, secret, and key. These credentials can be obtained from your [SocketBee Dashboard](https://platform.socketbee.com).

```php
$app_id = getenv('APP_ID');
$secret = getenv('APP_SECRET');
$key = getenv('APP_KEY');

$eventSender = new \SocketBee\SocketBee($app_id, $secret, $key);
```

### Step 3: Send an Event

Use the `sendEvent` method to send an event to a specific channel. The method requires the channel name, event name, and event data.

```php
$s = $eventSender->sendEvent('cool_channel', 'new-message', 'very cool stuff!');
```

### Step 4: Handle the Response

The `sendEvent` method returns an array containing the status and the body of the response. You can use this information to handle the success or failure of the event.

```php
var_dump($s);
```

## Example

Below is a complete example demonstrating how to use the SocketBee SDK in a PHP script:

```php
<?php

require 'vendor/autoload.php';

$app_id = getenv('APP_ID');
$secret = getenv('APP_SECRET');
$key = getenv('APP_KEY');

$eventSender = new \SocketBee\SocketBee($app_id, $secret, $key);
$s = $eventSender->sendEvent('cool_channel', 'new-message', 'very cool stuff!');

var_dump($s);
?>
```

## Configuration

The `SocketBee` class constructor accepts an optional configuration array. By default, it uses the following settings:

```php
$config = [
    'protocol' => 'https',
    'host' => 'east-1.socket.socketbee.com',
    'port' => 443,
];
```

If you are an [Enterprise](https://socketbee.com/pricing) user, you can override these settings by passing a custom configuration array when initializing the `SocketBee` class:

```php
$config = [
    'protocol' => 'https',
    'host' => 'your-custom-host.com',
    'port' => 8080,
];

$eventSender = new \SocketBee\SocketBee($app_id, $secret, $key, $config);
```

## Documentation

For detailed API documentation and additional examples, visit the [SocketBee PHP SDK Documentation](https://socketbee.com/docs/sdks/php.html).

## License

This SDK is open-sourced software licensed under the [MIT license](LICENSE).

## Contact

For any questions or issues, please contact [SocketBee Support](https://socketbee.com/support).