<?php

namespace App\Http\Controllers;

use App\Models\AppSettingManage;
use App\Services\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class AppSettingManageController extends Controller
{

    private $services;

    public function __construct(Services $services)
    {
        $this->services = $services;
    }
    public function edit()
    {
        // Retrieve the first record of the AppSettingManage model
        $record = AppSettingManage::first();

        // If no record exists, create a new instance
        if (!$record) {
            $record = new AppSettingManage();
        }

        return view('admin.pages.app_settings.edit', compact('record'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'phoneimage' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg,webp|max:2048',
            'phonenumber' => 'nullable|string',
            'emailimage' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg,webp|max:2048',
            'email' => 'nullable|email|max:255',
            'locationimage' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg,webp|max:2048',
            'location' => 'nullable|string',
            'policy1title' => 'nullable|string|max:255',
            'policy1description' => 'nullable|string',
            'policy2title' => 'nullable|string|max:255',
            'policy2description' => 'nullable|string',
        ]);

        // If validation fails, redirect back with errors
        if ($validator->fails()) {
            return Redirect::back()->withInput()->withErrors($validator);
        }

        // Retrieve the first record of the AppSettingManage model
        $record = AppSettingManage::first();

        // Create a new record if none exists
        if (!$record) {
            $record = new AppSettingManage();
        }

        // Handle file uploads
        $input = $request->except(['phoneimage', 'emailimage', 'locationimage']); // Exclude image files from $input

        // Handle phone image upload
        if ($request->hasFile('phoneimage')) {
            $phoneImage = $this->services->imageUpload($request->file('phoneimage'), 'img/');
            $input['phoneimage'] = 'img/' . $phoneImage;
        }

        // Handle email image upload
        if ($request->hasFile('emailimage')) {
            $emailImage = $this->services->imageUpload($request->file('emailimage'), 'img/');
            $input['emailimage'] = 'img/' . $emailImage;
        }

        // Handle location image upload
        if ($request->hasFile('locationimage')) {
            $locationImage = $this->services->imageUpload($request->file('locationimage'), 'img/');
            $input['locationimage'] = 'img/' . $locationImage;
        }

        // Update or create the record with the input data
        $record->fill($input);
        $record->save();

        // Redirect with success message
        // return redirect()->route('appSettingManage.edit')->with('success', 'Record updated successfully.');
        return redirect()->route('settingManage.index', ['tab' => 'app-tab'])->with('success', 'App Settings Updated.');
    }
}
