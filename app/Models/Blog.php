<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
     protected $fillable = [
        'title',
        'slug',
        'short_description',
        'category_id',
        'content',
        'image',
        'status',
    ];

    public function getRouteKeyName()
{
    return 'slug';
}
public function category()
{
    return $this->belongsTo(BlogCategory::class, 'category_id');
}
}
