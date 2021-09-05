<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'general_observation'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function enrollement() {
        return $this->hasMany(Enrollement::class);
    }
}
