<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PensumMatter extends Model
{
    use HasFactory;

    protected $fillable = [
        'matter_id',
        //'teacher_id',
        'pensum_id'
    ];

    public function matter() {
        return $this->belongsTo(Matter::class);
    }

    public function teachers() {
        return $this->belongsToMany(Teacher::class, 'pensum_matter_teachers');
    }
}
