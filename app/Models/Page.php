<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = [
    'title',
    'content',
    'status',
    'slug',
    'image',
    'short_description',
    'template'
];

public function seoMeta()
{
    return $this->hasOne(\App\Models\SeoMeta::class, 'seoble_id')->where('seoble_type', self::class);
}
}
