<?php

namespace App\Jobs;

use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class TestRabbitMQJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, SerializesModels;

    public $queue = 'user_cache_qeueu';

    public function __construct(public User $user, public $photoUrl) {}
    public function handle(): void
    {
        Log::info("$this->user" . PHP_EOL .
        "$this->photoUrl" . PHP_EOL .
        "✅ QUEUE IS WORKING PERFECTLY!");
    }
}
