<?php

namespace App\Jobs;

use App\Models\Product;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class ProductCreated implements ShouldQueue
{
    use Queueable;

    public function __construct(private array $productData) {}

    public function handle(): void
    {
        Product::create([
            'id' => $this->productData['id'],
            'title' => $this->productData['title'],
            'image' => $this->productData['image'],
            'created_at' => $this->productData['created_at'],
            'updated_at' => $this->productData['updated_at'],
        ]);
    }
}
