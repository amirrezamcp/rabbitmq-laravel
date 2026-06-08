<?php
// app/Jobs/SendUserLoginEvent.php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class SendUserLoginEvent implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, SerializesModels;

    public $queue = 'default';

    public $tries = 3;

    public $backoff = 5;

    protected $userId;
    protected $photoUrl;

    public function __construct($userId, $photoUrl = null)
    {
        $this->userId = $userId;
        $this->photoUrl = $photoUrl;
    }

    public function handle()
    {
        $payload = [
            'event' => 'user.created',
            'data' => [
                'user_id' => $this->userId,
                'photo_url' => $this->photoUrl,
                'timestamp' => now()->toDateTimeString(),
            ]
        ];

        $this->sendToRabbitMQ('user.created', $payload);
    }

    protected function sendToRabbitMQ($routingKey, $data)
    {
        try {
            $queue = app('queue')->connection('rabbitmq');

            $queue->pushRaw(json_encode($data), $routingKey);

            Log::info("Event sent successfully", [
                'routing_key' => $routingKey,
                'user_id' => $this->userId
            ]);

        } catch (\Exception $e) {
            Log::error("Failed to send event to RabbitMQ", [
                'routing_key' => $routingKey,
                'user_id' => $this->userId,
                'error' => $e->getMessage()
            ]);

            throw $e;
        }
    }

    public function failed(\Throwable $exception)
    {
        Log::error('SendUserLoginEvent failed permanently', [
            'user_id' => $this->userId,
            'error' => $exception->getMessage()
        ]);
    }
}
