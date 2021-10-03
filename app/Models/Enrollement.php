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
        return $this->belongsTo(SchoolYear::class, 'school_year_id', 'id');        
    }
    
    public function course() {
        return $this->belongsTo(Course::class);
    }

    public function turn() {
        return $this->belongsTo(Turn::class);
    }

    public function modality() {
        return $this->belongsTo(Modality::class);   
    }

    public function matters() {
        return $this->belongsToMany(Matter::class, 'enrollement_matters')->withPivot('id', 'created_at');
    }

    public function detailMatter() {
        return $this->belongsToMany(Matter::class, 'enrollement_matters')->using(EnrollementMatterPartial::class);
    }

    public function student() {
        return $this->belongsTo(Student::class);
    }
  
}
