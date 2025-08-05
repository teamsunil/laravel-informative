<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeSection extends Model
{
     protected $fillable = [
        'key_name', 'title', 'sub_title', 'content', 'image', 'button_text', 'button_link', 'status', 'ordering',

        'expert','cta','about_section_heading','about_section_image','about_section_description','services_headings','services_lists','latest_news'
    ];
}
