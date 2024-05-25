<?php

namespace SocketBee;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class SocketBee
{
    private $client;
    private $config;
    private $app_id;
    private $headers;

    public function __construct($app_id, $secret, $key, $config = [])
    {
        $this->client = new Client();
        $this->config = array_merge([
            'protocol' => 'https',
            'host' => 'east-1.socket.socketbee.com',
            'port' => 443,
        ], $config);
        $this->app_id = $app_id;
        $this->headers = [
            'Content-Type' => 'application/json',
            'secret' => $secret,
            'key' => $key,
        ];
    }

    private function getUrl()
    {
        return "{$this->config['protocol']}://{$this->config['host']}:{$this->config['port']}/send-event/{$this->app_id}";
    }

    public function sendEvent($channel, $event, $data)
    {
        $body = json_encode([
            'channel' => $channel,
            'event' => [
                'event' => $event,
                'data' => $data,
            ],
        ]);

        try {
            $response = $this->client->post($this->getUrl(), [
                'headers' => $this->headers,
                'body' => $body,
            ]);

            return [
                'status' => $response->getStatusCode(),
                'body' => (string)$response->getBody(),
            ];

        } catch (RequestException $e) {
            if ($e->hasResponse()) {
                return [
                    'status' => $e->getResponse()->getStatusCode(),
                    'errors' => (string)$e->getResponse()->getBody(),
                ];
            } else {
                return [
                    'status' => 0,
                    'error_message' => $e->getMessage(),
                ];
            }
        }
    }
}
