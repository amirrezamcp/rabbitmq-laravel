<?php

namespace App\Jobs;

use App\Models\Product;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class ProductDeleted implements ShouldQueue
{
    use Queueable;

    public function __construct(private string $productId) {}

    public function handle(): void
    {
        Product::destroy($this->productId);
    }
}
