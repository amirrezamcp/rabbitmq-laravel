<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class ProductUpdated implements ShouldQueue
{
    use Queueable;

    public function __construct(private array $productData) {}

    public function handle(): void
    {
        //
    }
}
