<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnknownMedicineReport extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'files',
        'doctor_id',
    ];

    public function doctor(){
        return $this->belongsTo(Doctor::class);
    }
}
