<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;

class PrescriptionAssist extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'image',
        'description',
        'user_id',
        'userType',
        'replay_user_type',
        'replay_user_id'
    ];





    public function patient()
    {
        return $this->belongsTo(Patient::class, 'user_id', 'id');
    }

    public function student()
    {
        return $this->belongsTo(Student::class, 'user_id', 'id');
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class, 'user_id', 'id');
    }

    public function replayDoctor()
    {
        return $this->belongsTo(Doctor::class, 'replay_user_id', 'id');
    }

    public function reports()
    {
        return $this->hasMany(PrescriptionAssistReplay::class, 'prescription_assist_id', 'id');
    }



    public function dateRangeFilter(Builder $query, $form = null, $to = null):Builder
    {
        $form = Carbon::parse($form)->startOfDay();
        $to = Carbon::parse($to)->endOfDay();
        if($form && !$to){
            $query->where('created_at', '>=', $form);
        }elseif(!$form && $to){
            $query->where('created_at', '<=', $to);
        }elseif($form && $to){

            $query->where('created_at', '>=', $form)->where('created_at', '<=', $to);
        }

        return $query;
    }


    public function scopeLast7Days(Builder $query):Builder
    {
        return $this->dateRangeFilter($query, now()->subDays(7));
    }

    public function scopeLast30Days()
    {
        return $this->where('created_at', '>=', now()->subDays(30));
    }

    public function scopeFilterByDate(Builder $query, $form = null, $to = null):Builder
    {
        return $this->dateRangeFilter($query, $form, $to);
    }

}
