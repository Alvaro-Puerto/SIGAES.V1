<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partial extends Model
{
    use HasFactory;

    protected $fillable = [
        'semester_id',
        'name',
        'format',
        'value',
        'start_at',
        'end_at'
    ];

    public function semester() {
        return $this->belongsTo(Semester::class);
    }
}
