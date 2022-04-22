<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pensum extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'school_year_id', 'course_id'];


    public function course() {
        return $this->belongsTo(Course::class, 'course_id', 'id');
    }

    public function school_year() {
        return $this->belongsTo(SchoolYear::class, 'school_year_id', 'id');
    }

    public function matter() {
        return $this->hasMany(PensumMatter::class, 'pensum_id', 'id');
    }
}
