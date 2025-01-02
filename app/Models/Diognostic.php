<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diognostic extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'age',
        'gender',
        'number',
        'file',
        'problem_title',
        'problem',
        'patient_type',
        'patient_id',
        'doctor_id'
    ];


    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function student()
    {
        return $this->belongsTo(Student::class, 'patient_id', 'id');
    }

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patient_id', 'id');
    }


    public function prescription()
    {
        return $this->hasMany(Prescription::class, 'diognostic_id', 'id');
    }

    /// local scope function

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
