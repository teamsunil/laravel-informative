<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Page;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Models\HomeSection;

class HomeController extends Controller
{
     public function index()
    {
        $settings = Setting::pluck('value', 'key')->toArray();
            $page = Page::where('slug', 'home')
                    ->firstOrFail();
        // $sections = Section::where('status', 1)->get()->keyBy('key');
        $blogs = Blog::latest()->take(6)->get();

        $homeSection = HomeSection::first();

        return view('front.home', compact('settings', 'page', 'homeSection', 'blogs'));
    }
}