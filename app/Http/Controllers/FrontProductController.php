<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Setting;


class FrontProductController extends Controller
{
    public function index()
    {
        $settings = Setting::pluck('value', 'key')->toArray();
        $products = Product::where('status', 1)->paginate(12);
        return view('front.products.index', compact('products','settings'));
    }

    public function show($slug)
    {
        $settings = Setting::pluck('value', 'key')->toArray();
        $product = Product::where('slug', $slug)->where('status', 1)->firstOrFail();
        return view('front.products.show', compact('product','settings'));
    }
}
