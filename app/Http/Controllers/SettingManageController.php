<?php

namespace App\Http\Controllers;

use App\Models\AppSettingManage;
use App\Models\Setting;
use App\Models\UserSetting;
use Illuminate\Http\Request;

class SettingManageController extends Controller
{
    public function index(){
        $appSettingManage = AppSettingManage::first();

        // If no appSettingManage exists, create a new instance
        if (!$appSettingManage) {
            $appSettingManage = new AppSettingManage();
        }

        $webSettingManage = Setting::first();
        $userSetting = UserSetting::first();

        return view('admin.pages.setting_manages.index', compact('appSettingManage', 'webSettingManage', 'userSetting'));
    }
}
