<?php

namespace App\Http\Controllers\Api;

use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductImageController extends Controller
{
    public function index()
    {
        return response()->json(ProductImage::with('product')->get());
    }

    public function showByProduct($productId)
    {
        return response()->json(
            ProductImage::where('product_id', $productId)->get()
        );
    }
}
