<?php
namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Setting;
use Illuminate\Http\Request;
class BlogController extends Controller
{
    public function index()
    {
        $settings = Setting::pluck('value', 'key')->toArray();
        $blogs = Blog::latest()->paginate(10);
        return view('front.blog.blog_listing', compact('blogs','settings'));
    }

    public function show(Blog $blog)
    {  
        $settings = Setting::pluck('value', 'key')->toArray();
        $latestBlogs = Blog::latest()->take(5)->get();
        return view('front.blog.blog_detail', compact('blog','latestBlogs','settings'));
    }
}