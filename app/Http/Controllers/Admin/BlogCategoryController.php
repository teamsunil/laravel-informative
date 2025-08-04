<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlogCategory;
use Illuminate\Support\Str;

class BlogCategoryController extends Controller
{
    public function index()
    {
        $categories = BlogCategory::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.blog-categories.index', compact('categories'));
    }

    public function create()
    {
        // dd('Create a new blog category');
        return view('admin.blog-categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:blog_categories,name',
            'slug' => 'nullable|unique:blog_categories,slug',
        ]);

        $slug = $request->slug ?: Str::slug($request->name);

        BlogCategory::create([
            'name' => $request->name,
            'slug' => $slug,
            'description' => $request->description,
            'status' => $request->status ?? 1,
        ]);

        return redirect()->route('blog-categories.index')->with('success', 'Category created successfully.');
    }

    public function edit(BlogCategory $blog_category)
    {
        return view('admin.blog-categories.edit', compact('blog_category'));
    }

    public function update(Request $request, BlogCategory $blog_category)
    {
        $request->validate([
            'name' => 'required|unique:blog_categories,name,' . $blog_category->id,
            'slug' => 'nullable|unique:blog_categories,slug,' . $blog_category->id,
        ]);

        $slug = $request->slug ?: Str::slug($request->name);

        $blog_category->update([
            'name' => $request->name,
            'slug' => $slug,
            'description' => $request->description,
            'status' => $request->status ?? 1,
        ]);

        return redirect()->route('blog-categories.index')->with('success', 'Category updated successfully.');
    }

    public function destroy(BlogCategory $blog_category)
    {
        $blog_category->delete();
        return redirect()->route('blog-categories.index')->with('success', 'Category deleted successfully.');
    }
}
