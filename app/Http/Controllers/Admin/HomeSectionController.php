<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomeSection;

class HomeSectionController extends Controller
{
    public function edit()
    {
        $homeSection = HomeSection::first();
        return view('admin.home_sections.edit', compact('homeSection'));
    }

    public function update(Request $request)
    {

        // dd($request->all());
        $homeSection = HomeSection::first();

        $homeSection->title = $request->title;
        $homeSection->sub_title = $request->sub_title;
        $homeSection->cta = $request->cta;
        $homeSection->expert = $request->expert;
        $homeSection->latest_news = $request->latest_news;
        $homeSection->about_section_heading = $request->about_section_heading;
         $homeSection->about_section_image = $request->about_section_image;
         $homeSection->about_section_description = $request->about_section_description;

        if ($request->hasFile('banner_image')) {
            $path = $request->file('banner_image')->store('uploads/home', 'public');
            $homeSection->banner_image = $path;
        }

        if ($request->hasFile('about_section_image')) {
            $path = $request->file('about_section_image')->store('uploads/home', 'public');
            $homeSection->about_section_image = $path;
        }

        $homeSection->services_lists = json_encode($request->services_lists);
        $homeSection->testimonial_lists = json_encode($request->testimonial_lists);

        // dd($homeSection->expert);

        $homeSection->save();

        return redirect()->back()->with('success', 'Home Page updated successfully.');
    }
}