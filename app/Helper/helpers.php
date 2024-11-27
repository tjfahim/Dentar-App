<?php

use App\Models\AdvacneBonus;
use Carbon\Carbon;
use App\Models\AttandanceLog;
use App\Models\DeviceUser;
use App\Models\Expense;
use App\Models\Leave;
use App\Models\SalaryManageReport;
use App\Models\Setting;


function settings(){
    return Setting::first();
}

