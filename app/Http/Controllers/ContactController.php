<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Contact;
use App\Models\Setting;

class ContactController extends Controller
{
    public function show()
    {
         $settings = Setting::pluck('value', 'key')->toArray();
        return view('front.contact',compact('settings'));
    }

    public function send(Request $request)
    {
        $validated = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email',
            'message' => 'required|string',
        ]);

        // dd($validated);

        // Save contact feedback in the database
        Contact::create($validated);

        return back()->with('success', 'Your message was sent successfully.');
    }
}