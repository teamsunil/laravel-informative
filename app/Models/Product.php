<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'wp_id',
        'slug',
        'sku',
        'type',
        'description',
        'short_description',
        'price',
        'regular_price',
        'sale_price',
        'on_sale',
        'purchasable',
        'featured',
        'status',
        'stock_status',
        'weight',
        'dimensions',
        'brand',
        'preorder_text',
        'product_code',
        'free_delivery',
        'image',
        'gallery',
        'categories',
        'total_sales'
    ];

    protected $casts = [
        'on_sale' => 'boolean',
        'purchasable' => 'boolean',
        'featured' => 'boolean',
        'free_delivery' => 'boolean',
        'dimensions' => 'array',
        'gallery' => 'array',
        'categories' => 'array',
    ];
    public function seo()
    {
        return $this->morphOne(\App\Models\SeoMeta::class, 'seoble');
    }
    public function meta()
{
    return $this->hasMany(\App\Models\ProductMeta::class);
}
}
