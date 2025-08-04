<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SeoMeta extends Model
{
   protected $table = 'seo_meta';

   protected $fillable = [
        'seoble_type',
        'seoble_id',
        'title',
        'description',
        'keywords',
        'og_title',
        'og_description',
        'twitter_title',
        'twitter_description',
    ];

    public function seoble()
    {
        return $this->morphTo();
    }
}
