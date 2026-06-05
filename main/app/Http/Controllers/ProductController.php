<?php

namespace App\Http\Controllers;

use App\Jobs\ProductLike;
use App\Models\Product;
use App\Models\ProductUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Product::all();
    }

    public function like(Request $request, $id)
    {
        $response = Http::get("http://127.0.0.1:8000/api/user");

        $user = $response->json();
        try{
            $product = ProductUser::create([
                'user_id' => $user['id'],
                'product_id' => $id
            ]);

            ProductLike::dispatch($product->toArray())->onQueue("admin_queue");

            return response()->json(['message' => 'Product liked successfully.'], 200);
        }catch(\Exception $e){
            return response()->json(['error' => 'You have already liked this product.'], 400);
        }
    }
}
