<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnrollementMatter extends Model
{
    use HasFactory;

    public function matter() {
        return $this->belongsTo(Matter::class);
    }

    public function partials() {
        return $this->belongsToMany(Partial::class, 'enrollement_matter_partials')->withPivot('value');
    }
}
