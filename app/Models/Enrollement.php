<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrollement extends Model
{
    use HasFactory;


    protected $fillable = [
        'student_id',
        'level_id',
        'modality_id',
        'turn_id',
        'school_year_id',
        'course_id',
        'is_repeat',
        'count_repeat',
        'reason_repeat',
        'type',
        'general_observation',

    ];

    public function level() {
        return $this->belongsTo(Level::class);
    }

    public function year() {
        return $this->belongsTo(SchoolYear::class, 'id');
    }
    
    public function course() {
        return $this->belongsTo(Course::class);
    }

    public function modality() {
        return $this->belongsTo(Modality::class);   
    }
}
