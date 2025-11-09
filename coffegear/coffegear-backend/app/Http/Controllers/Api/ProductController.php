<?php

namespace App\Http\Controllers\Api;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with(['brand', 'category', 'images'])
            ->orderBy('created_at', 'desc')
            ->paginate(9);

        return response()->json($products);
    }

    public function show($id)
    {
        $product = Product::with(['category', 'brand', 'images'])->findOrFail($id);

        return response()->json($product);
    }

    public function showBySlug($slug)
    {
        $product = Product::with(['brand', 'category', 'images'])
            ->where('slug', $slug)
            ->firstOrFail();

        return response()->json($product);
    }

    public function byCategorySlug($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();

        $products = Product::with(['brand', 'category', 'images'])
            ->where('category_id', $category->id)
            ->get();

        return response()->json([
            'category' => $category->name,
            'products' => $products,
        ]);
    }

    public function search($query)
    {
        $products = Product::with(['brand', 'category', 'images'])
            ->where('name', 'ILIKE', "%{$query}%")
            ->orWhere('description', 'ILIKE', "%{$query}%")
            ->orWhereHas(
                'brand',
                fn($q) =>
                $q->where('name', 'ILIKE', "%{$query}%")
            )
            ->get();

        return response()->json($products);
    }

    public function filter(Request $request)
    {
        $query = Product::with(['brand', 'category', 'images']);

        if ($request->filled('category_slug')) {
            $category = Category::where('slug', $request->category_slug)->first();
            if ($category) {
                $query->where('category_id', $category->id);
            }
        }

        if ($request->filled('brand_slug')) {
            $brand = Brand::where('slug', $request->brand_slug)->first();
            if ($brand) {
                $query->where('brand_id', $brand->id);
            }
        }

        if ($request->filled('min_price') && $request->filled('max_price')) {
            $query->whereBetween('price', [(float)$request->min_price, (float)$request->max_price]);
        }

        if ($request->boolean('in_stock')) {
            $query->where('stock', '>', 0);
        }

        $products = $query->orderBy('created_at', 'desc')->paginate(8);

        return response()->json($products);
    }

    public function flashDeals()
    {
        return response()->json(
            Product::with(['category', 'brand', 'images'])->whereNotNull('discount')->orderByDesc('discount')->limit(8)->get()
        );
    }
}
