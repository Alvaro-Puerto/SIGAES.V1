<?php

namespace App\Exports;

use App\Models\Matter;
use Maatwebsite\Excel\Concerns\FromCollection;

class MatterExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Matter::all();
    }
}
