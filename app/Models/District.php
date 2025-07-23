<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'name_bn'
    ];
    
    public function getFullNameAttribute():string
    {
        return $this->name . "(". $this->name_bn . ")";   
    }
}
