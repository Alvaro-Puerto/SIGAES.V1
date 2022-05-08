<?php

namespace Database\Seeders;

use App\Models\SchoolYear as ModelsSchoolYear;
use Illuminate\Database\Seeder;

class SchoolYear extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        ModelsSchoolYear::create(
            [
                'name' => 'Anyo lectivo 2019',
                'description' => 'Anyo lectivo 2019',
                'start_at' => '2019-01-01',
                'end_at' => '2019-12-31',
                'school_information_id' => 1
            ]
        );

        
        ModelsSchoolYear::create(
            [
                'name' => 'Anyo lectivo 2021',
                'description' => 'Anyo lectivo 2021',
                'start_at' => '2021-01-01',
                'end_at' => '2021-12-31',
                'school_information_id' => 1
            ]
        );

        
        ModelsSchoolYear::create(
            [
                'name' => 'Anyo lectivo 2022',
                'description' => 'Anyo lectivo 2022',
                'start_at' => '2022-01-01',
                'end_at' => '2022-12-31',
                'school_information_id' => 1
            ]
        );
    }
}
