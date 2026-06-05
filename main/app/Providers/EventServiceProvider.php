<?php

namespace App\Providers;

use App\Jobs\ProductCreated;
use Illuminate\Support\ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        \app()->bindMethod(ProductCreated::class . '@handle', fn($job) => $job->handle());
    }
}
