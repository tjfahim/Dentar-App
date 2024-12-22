<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrescriptionReadReport extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'files',
        'doctor_id',
        'prescription_read_id',
    ];


    public function doctor(){
        return $this->belongsTo(Doctor::class);
    }

}
