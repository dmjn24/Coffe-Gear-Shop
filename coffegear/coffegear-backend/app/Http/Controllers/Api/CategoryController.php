<?php

namespace App\Http\Controllers\Api;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function mainCategories()
    {
        $categories = Category::with('children')
            ->whereNull('parent_id')
            ->get();

        return response()->json($categories);
    }

    public function subcategoriesByParentSlug($slug)
    {
        $parent = Category::where('slug', $slug)->firstOrFail();

        $subcategories = Category::where('parent_id', $parent->id)
            ->with('children') // optional if you want deeper nesting
            ->get();

        return response()->json([
            'parent' => $parent->name,
            'subcategories' => $subcategories
        ]);
    }

    public function productsByCategorySlug($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();

        $products = Product::with(['brand', 'category', 'images'])
            ->where('category_id', $category->id)
            ->get();

        return response()->json([
            'category' => $category->name,
            'products' => $products
        ]);
    }

    public function showBySlug($slug)
    {
        $category = Category::with(['children.products', 'products'])
            ->where('slug', $slug)
            ->firstOrFail();

        return response()->json($category);
    }

    public function brandsByCategorySlug($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();

        $brands = Brand::whereHas('products', function ($q) use ($category) {
            $q->where('category_id', $category->id);
        })->get();

        return response()->json([
            'category' => $category->name,
            'brands' => $brands
        ]);
    }
}
