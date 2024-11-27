<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

    class AppSettingManage extends Model
    {
        use HasFactory;

        protected $fillable = [
            'title',
            'description',
            'phoneimage',
            'phonenumber',
            'emailimage',
            'email',
            'locationimage',
            'location',
            'policy1title',
            'policy1description',
            'policy2title',
            'policy2description',
        ];
    }
