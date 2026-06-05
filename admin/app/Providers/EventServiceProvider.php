<?php

namespace App\Providers;

use App\Jobs\ProductLike;
use Illuminate\Support\ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        \app()->bindMethod(ProductLike::class . '@handle', fn($job) => $job->handle());
    }
}
