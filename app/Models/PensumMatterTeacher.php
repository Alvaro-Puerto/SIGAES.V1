<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PensumMatterTeacher extends Model
{
    use HasFactory;

    public function pensum() {
        return $this->hasOneThrough(Pensum::class, PensumMatter::class);
    }
}
