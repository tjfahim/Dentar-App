<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MessageManage extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'sender_id',
        'receiver_id',
        'message',
        'file_url',
        'status',
    ];

    protected $casts = [
        'file_url' => 'array',
    ];

    public function sender()
    {
        return $this->belongsTo(Doctor::class, 'sender_id');
    }

    public function receiver()
    {
        return $this->belongsTo(Doctor::class, 'receiver_id');
    }

}
