<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'capacity',
        'school_information_id'
    ];

    public function school() {
        return $this->belongsTo(SchoolInformation::class, 'school_information_id', 'id');
    }

    public function pensum() {
        return $this->hasMany(Pensum::class, 'course_id');
    }
}
