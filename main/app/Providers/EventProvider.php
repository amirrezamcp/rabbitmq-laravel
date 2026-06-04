<?php

namespace App\Providers;

use App\Jobs\TestJob;
use Illuminate\Support\ServiceProvider;

class EventProvider extends ServiceProvider
{
    public function boot(): void
    {
        \app()->bindMethod(TestJob::class . '@handle', fn($job) => $job->handle());
    }
}
