<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;
use App\Services\Services;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class SettingsControler extends Controller
{
    private $services;
    public function __construct(Services $services)
    {
        $this->services = $services;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = Setting::first();

        $user = Auth::user();


        return  view('admin.pages.settings.index', compact('settings', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Setting $setting)
    {
        $request->validate([
            'website_name' => 'required|string',
            'website_email' => 'required|email|string',
        ]);
        
      
        $setting->update([
            'website_name'      => $request->website_name ?? $setting->website_name,
            'website_email'     => $request->website_email ?? $setting->website_email,
            'address'           => $request->address ?? $setting->address,
            'phone'           => $request->phone ?? $setting->phone,
            'api_url'           => $request->api_url ?? $setting->api_url
        ]);
        if($request->hasFile('website_logo')) {
            $this->services->imageDestroy($setting->website_logo,'admin/');
            $logo  = $this->services->imageUpload($request->file('website_logo'),'admin/');
            $setting->update([
                'website_logo' => $logo,
            ]);
        };
        if($request->hasFile('website_favicon')){
            $this->services->imageDestroy($setting->website_favicon,'admin/');
            $favicon = $this->services->imageUpload($request->file('website_favicon'),'admin/');
            $setting->update([
                'website_favicon' => $favicon
            ]);
        }
        // return back()->with('message','Settings Updated.');
        return redirect()->route('settingManage.index', ['tab' => 'web-tab'])->with('success', 'Web Settings Updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function settingsInfo($id){
        $user = User::findOrFail($id);
        $settings = Setting::first();
        return view('admin.pages.settings.index', compact('user', 'settings'));
    }

    public function settingsChangeUserPassword(Request $request, $id){

        $request->validate([
            'current_password' => 'required|string',
            'new_password' => 'required|string',
            'confirm_password' => 'required|string',
        ]);

        $user = User::findOrFail($id);

        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->back()->withErrors(['current_password' => 'The current password is incorrect.']);
        }

        if ($request->new_password !== $request->confirm_password) {
            return redirect()->back()->withErrors(['new_password' => 'The new password and confirmation do not match.']);
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->route('user.changePassword', ['id' => $user->id])->with('success', 'Password updated successfully.');
    }
}
