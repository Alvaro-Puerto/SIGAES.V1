<?php

namespace App\Exports;

use App\Models\Teacher;
use Maatwebsite\Excel\Concerns\FromCollection;

class TeacherExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $teachers = Teacher::all();

        foreach($teachers as $user) {
            return $user->user;
        }
        return $teachers;
        
    }
}
