<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SocialLink;
use Illuminate\Http\Request;


class SocialLinkController extends Controller
{
    /**
     * Show the form for editing social links.
     */
    public function index()
    {
        // Assuming there is only one social link record
        $socialLink = SocialLink::first();
        return view('admin.pages.socialLink.index', compact('socialLink'));
    }

    /**
     * Update the social link data.
     */
    public function update(Request $request)
    {
        $request->validate([
            'facebook' => 'nullable|url',
            'gmail' => 'nullable|email',
            'linkedin' => 'nullable|url',
            'messenger' => 'nullable|url',
        ]);

        $socialLink = SocialLink::first();
        $socialLink->update($request->only([
            'facebook',
            'gmail',
            'linkedin',
            'messenger',
        ]));

        return redirect()->back()->with('success', 'Social links updated successfully.');
    }
}
