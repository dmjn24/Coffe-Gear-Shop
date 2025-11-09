<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'price',
        'stock',
        'discount',
        'category_id',
        'brand_id',
    ];

    public function category()
    {
        $this->belongsTo(Category::class);
    }

    public function brand()
    {
        $this->belongsTo(Brand::class);
    }

    public function images()
    {
        $this->hasMany(ProductImage::class);
    }
}
