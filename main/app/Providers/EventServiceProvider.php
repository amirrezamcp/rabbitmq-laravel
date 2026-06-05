<?php

namespace App\Providers;

use App\Jobs\ProductCreated;
use App\Jobs\ProductDeleted;
use App\Jobs\ProductUpdated;
use Illuminate\Support\ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        \app()->bindMethod(ProductCreated::class . '@handle', fn($job) => $job->handle());
        \app()->bindMethod(ProductUpdated::class . '@handle', fn($job) => $job->handle());
        \app()->bindMethod(ProductDeleted::class . '@handle', fn($job) => $job->handle());
    }
}
