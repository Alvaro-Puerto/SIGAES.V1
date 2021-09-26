<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolInformation extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'address',
        'code',
        'city',
        'municipality',
        'logo'
    ];

    public function course() {
        return $this->hasMany(Course::class,'school_information_id' ,'id');  // Relacion uno a muchos
    }

    public function turn() {
        return $this->hasMany(Turn::class, 'school_information_id', 'id'); // Relacion uno a muchos
    }

    public function matters() {
        return $this->hasMany(Matter::class,  'school_information_id');
    }

    public function years() {
        return $this->hasMany(SchoolYear::class, 'school_information_id');
    }
}
