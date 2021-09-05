<?php

namespace App\Exports;

use App\Models\Enrollement;
use Maatwebsite\Excel\Concerns\FromCollection;

class EnrollementExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Enrollement::all();
    }
}
