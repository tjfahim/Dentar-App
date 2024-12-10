<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrescriptionAssist extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'image',
        'description',
        'user_id',
        'userType'
    ];


    // public function patient()
    // {

    // }

    // public function student()
    // {

    // }

    // public function doctor()
    // {

    // }
}
