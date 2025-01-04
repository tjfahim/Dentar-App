<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingsController extends Controller
{
    public function index()
    {
        return view('admin.settings.index', [
            'settings' => Setting::first()
        ]);
    }

    public function edit()
    {
        return view('admin.settings.edit', [
            'settings' => Setting::first()
        ]);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'website_name' => 'required|string|max:255',
            'website_email' => 'required|email|max:255',
            'website_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'website_favicon' => 'nullable|image|mimes:ico,png|max:1024',
            'address' => 'nullable|string|max:500',
            'phone' => 'nullable|string|max:15',
            'api_url' => 'nullable|url|max:255',
        ]);

        $settings = Setting::findOrFail($id);

        $settings->website_name = $request->website_name;
        $settings->website_email = $request->website_email;
        $settings->address = $request->address;
        $settings->phone = $request->phone;
        $settings->api_url = $request->api_url;

        if ($request->hasFile('website_logo')) {
            if ($settings->website_logo && Storage::exists('public/admin/' . $settings->website_logo)) {
                Storage::delete('public/admin/' . $settings->website_logo);
            }
            $logoPath = $request->file('website_logo')->store('public/admin');
            $settings->website_logo = basename($logoPath);
        }

        if ($request->hasFile('website_favicon')) {
            if ($settings->website_favicon && Storage::exists('public/admin/' . $settings->website_favicon)) {
                Storage::delete('public/admin/' . $settings->website_favicon);
            }
            $faviconPath = $request->file('website_favicon')->store('public/admin');
            $settings->website_favicon = basename($faviconPath);
        }

        $settings->save();

        return redirect()->route('web.settings.index')->with('success', 'Website settings updated successfully.');
    }


}
