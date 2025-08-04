<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Models\SeoMeta;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pages = Page::all();
        return view('admin.pages.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'slug' => 'required',
            'short_description'=>'required'
        ]);
         if ($request->hasFile('image')) {
            $request['image'] = $request->file('image')->store('blogs', 'public');
        }
    $page = Page::create($request->only(['title', 'slug', 'content', 'status','template','short_description','image']));

        SeoMeta::create([
        'seoble_type' => Page::class,
        'seoble_id' => $page->id,
        'title' => $request->seo_title,
        'description' => $request->seo_description,
        'keywords' => $request->seo_keywords,
        'og_title' => $request->og_title,
        'og_description' => $request->og_description,
        'twitter_title' => $request->twitter_title,
        'twitter_description' => $request->twitter_description,
    ]);
        return redirect()->route('pages.index')->with('success', 'Page created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Page $page)
    {
         $page->load('seoMeta');
        return view('admin.pages.edit', compact('page'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Page $page)
    {
        $data=array();
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'slug' => 'required',
            'short_description'=>'required',
            'image' => 'nullable|image',
        ]);
        $page->update($request->only(['title', 'slug', 'content', 'status', 'template','short_description','image']));  
         if ($request->hasFile('image')) {
         $data['image'] = $request->file('image')->store('blogs', 'public');
    }

    $page->update($data);
        
          // Update or create SEO meta
            SeoMeta::updateOrCreate(
                [
                    'seoble_type' => Page::class,
                    'seoble_id' => $page->id,
                ],
                [
                    'title' => $request->seo_title,
                    'description' => $request->seo_description,
                    'keywords' => $request->seo_keywords,
                    'og_title' => $request->og_title,
                    'og_description' => $request->og_description,
                    'twitter_title' => $request->twitter_title,
                    'twitter_description' => $request->twitter_description,
                ]
            );
        
        return redirect()->route('pages.index')->with('success', 'Page updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Page $page)
    {
        $page->delete();
        return redirect()->route('pages.index')->with('success', 'Page deleted!');
    }


    // public function seoMeta()
    // {
    //         return $this->hasOne(\App\Models\SeoMeta::class, 'seoble_id')->where('seoble_type', self::class);

    // }
}
