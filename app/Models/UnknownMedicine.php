<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnknownMedicine extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'files',
        'status',
        'user_type',
        'user_id'
    ];


    public function report()
    {
        return $this->hasMany(UnknownMedicineReport::class, 'unkown_medicine_id', 'id');
    }


    public function patient()
    {
        return $this->belongsTo(Patient::class, 'user_id', 'id');
    }


    public function student()
    {
        return $this->belongsTo(Student::class, 'user_id', 'id');
    }
}
