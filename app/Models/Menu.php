<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
        protected $fillable = ['title', 'slug', 'url', 'position', 'order', 'status'];
}
