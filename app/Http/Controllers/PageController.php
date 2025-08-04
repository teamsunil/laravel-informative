<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Setting;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function show($slug)
    {
        $settings = Setting::pluck('value', 'key')->toArray();
        $page = Page::where('slug', $slug)
                    ->firstOrFail();

        return view('front.pages.show', compact('page','settings'));
    }
}
