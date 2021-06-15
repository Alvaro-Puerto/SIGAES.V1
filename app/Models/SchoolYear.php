<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolYear extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'end_at',
        'start_at',
    ];

    public function school() {
        return $this->belongsTo(SchoolInformation::class);
    }

    public function semester() {
        return $this->hasMany(Semester::class, 'school_year_id');
    }
}
