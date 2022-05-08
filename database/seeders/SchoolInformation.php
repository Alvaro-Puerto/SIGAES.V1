<?php

namespace Database\Seeders;

use App\Models\SchoolInformation as ModelsSchoolInformation;
use Illuminate\Database\Seeder;

class SchoolInformation extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        ModelsSchoolInformation::create([
            'name' => 'Modesto armijo',
            'address' => 'Leon',
            'code' => '112345',
            'city' => 'Leon',
            'municipality' => 'Leon',
        ]);
    }
}
