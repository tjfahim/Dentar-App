<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    use HasFactory;

    protected $fillable = [
        'diognostic_id',
        'note',
        'report_file'
    ];


    public function medicines()
    {
        return $this->hasMany(Medicine::class, 'prescription_id', 'id');
    }
}
