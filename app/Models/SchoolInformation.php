<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolInformation extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'address',
        'code',
        'city',
        'municipality'
    ];

    public function course() {
        return $this->hasMany(Course::class,'school_information_id' ,'id');
    }

    public function turn() {
        return $this->hasMany(Turn::class, 'school_information_id', 'id');
    }

}
