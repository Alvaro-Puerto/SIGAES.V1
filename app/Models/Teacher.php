<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = [         //
        'inss',                     // Campos rellenable
        'general_observation'       //
    ];

    public function user() {
        return $this->belongsTo(User::class); // Relacion uno a uno Para el usuario por la password y el email
    }

    public function matters() {
        return $this->belongsToMany(Matter::class, 'matter_teachers'); //Relacion muchos a muchos
    }
}
