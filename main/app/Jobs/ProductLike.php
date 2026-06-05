<?php

namespace App\Jobs;

use App\Models\Product;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class ProductLike implements ShouldQueue
{
    use Queueable;

    public function __construct(private array $productData) {}

    public function handle(): void
    {
        //
    }
}
