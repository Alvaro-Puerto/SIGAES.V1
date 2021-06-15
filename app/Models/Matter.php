<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matter extends Model
{
    use HasFactory;
    
    protected $fillable = [     //
        'name',                 // Campos rellenables
        'description'           //
    ];

    public function teachers() {
        return $this->belongsToMany(Teacher::class, 'matter_teachers'); //Relacion muchos a muchos
    }
}
