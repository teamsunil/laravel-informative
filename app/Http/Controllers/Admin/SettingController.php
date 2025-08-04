<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use JeroenNoten\LaravelAdminLte\Events\DarkModeWasToggled;

class SettingController extends Controller
{

    protected $sessionKey = 'adminlte_dark_mode';
    public function edit_settings()
    {
        $settings = Setting::pluck('value', 'key')->toArray();
        return view('admin.settings.edit', compact('settings'));
    }
    public function update_settings(Request $request)
    {
        // Fetch current settings to detect dark mode change
        $settings = Setting::pluck('value', 'key')->toArray();

        // Validation
        $data = $request->validate([
            'site_name' => 'required|string',
            'tagline' => 'nullable|string',
            'site_email' => 'required|email',
            'site_phone' => 'nullable|string',
            'site_address' => 'nullable|string',
            'facebook_url' => 'nullable',
            'twitter_url' => 'nullable',
            'instagram_url' => 'nullable',
            'footer_text' => 'nullable|string',
            'working_hours' => 'nullable|string',
            'enable_darkmode' => 'nullable|boolean',
            'logo' => 'nullable|image|max:2048',
            'favicon' => 'nullable|image|max:1024',
            'hero_background_url' => 'nullable|image|max:4096',
            'about_image' => 'nullable|image|max:4096',
        ]);
        // Boolean settings
        $data['enable_darkmode'] = $request->has('enable_darkmode') ? '1' : '0';

        // Handle file uploads
      foreach (['logo', 'favicon', 'hero_background_url', 'about_image'] as $fileKey) {
        if ($request->hasFile($fileKey) && $request->file($fileKey)->isValid()) {
            $path = $request->file($fileKey)->store('uploads/settings', 'public'); // ✅ store file
            $data[$fileKey] = $path; // ✅ assign path to $data
        } else {
            unset($data[$fileKey]); // Don't overwrite existing value if file wasn't uploaded
        }
    }


        // Update dark mode session only if changed
        if (
            isset($settings['enable_darkmode']) &&
            $settings['enable_darkmode'] !== $data['enable_darkmode']
        ) {
            session(['adminlte_dark_mode' => $data['enable_darkmode'] === '1']);
        }

        // Save all other settings (excluding uploaded files)
        foreach ($data as $key => $value) {
            Setting::set($key, $value);
        }

      

        return redirect()->back()->with('success', 'Settings updated successfully!');
    }

    public function toggle()
    {
        // Store the new dark mode preference on the session. This way, we can
        // keep the dark mode preference over multiple requests.

        session([$this->sessionKey => ! $this->isEnabled()]);

        // Dispatch an event to notify this situation. This way, a listener may
        // read the new dark mode preference using the controller, and update
        // that preference on a database or another tool for persist data.

        event(new DarkModeWasToggled($this));
    }
    public function isEnabled()
    {
        // First, check if dark mode preference is available on the session.

        if (! is_null(session($this->sessionKey, null))) {
            return session($this->sessionKey);
        }

        // Otherwise, fallback to the default package configuration preference.

        return (bool) config('adminlte.layout_dark_mode', false);
    }

    /**
     * Enables the dark mode.
     *
     * @return void
     */
    public function enable()
    {
        session([$this->sessionKey => true]);
    }

    /**
     * Disables the dark mode.
     *
     * @return void
     */
    public function disable()
    {
        session([$this->sessionKey => false]);
    }
}
