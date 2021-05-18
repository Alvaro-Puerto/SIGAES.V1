<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Turn extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name'
    ];

    public function school() {
        return $this->belongsTo(SchoolInformation::class);
    }
}
