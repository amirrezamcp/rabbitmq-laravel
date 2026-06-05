<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class ProductDeleted implements ShouldQueue
{
    use Queueable;

    public function __construct(private string $productId) {}

    public function handle(): void
    {
        //
    }
}
