<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParentStudent extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'general_observation'];


    public function user() {
        return $this->belongsTo(User::class);
    }

    public function student() {
        return $this->belongsToMany(Student::class, 'student_parent_relations');
    }
}
