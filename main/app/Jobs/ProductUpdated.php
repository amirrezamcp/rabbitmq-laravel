<?php

namespace App\Jobs;

use App\Models\Product;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class ProductUpdated implements ShouldQueue
{
    use Queueable;

    public function __construct(private array $productData) {}

    public function handle(): void
    {
        $product = Product::find($this->productData['id']);
        $product->update([
            'title' => $this->productData['title'],
            'image' => $this->productData['image'],
            'updated_at' => $this->productData['updated_at'],
        ]);
    }
}
