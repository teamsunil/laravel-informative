<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = [
            'name',
            'wp_id',
            'slug',
            'description',
            'parent_id',
            'menu_order',
            'image_url',
            'image_alt',
        ];

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function seo()
    {
        return $this->morphOne(SeoMeta::class, 'seoble');
    }
}
