<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Seeder;

class GradeYear extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Course::create([
            'name' => '1 Grado',
            'capacity' => 60,
            'school_information_id' => 1

        ]);

        Course::create([
            'name' => '2 Grado',
            'capacity' => 60,
            'school_information_id' => 1

        ]);

        Course::create([
            'name' => '3 Grado',
            'capacity' => 60,
            'school_information_id' => 1

        ]);

        Course::create([
            'name' => '6 Grado',
            'capacity' => 60,
            'school_information_id' => 1

        ]);

        Course::create([
            'name' => '5 Grado',
            'capacity' => 60,
            'school_information_id' => 1

        ]);

        Course::create([
            'name' => '4 Grado',
            'capacity' => 60,
            'school_information_id' => 1

        ]);

        Course::create([
            'name' => '7 Grado',
            'capacity' => 60,
            'school_information_id' => 1

        ]);

        Course::create([
            'name' => '8 Grado',
            'capacity' => 60,
            'school_information_id' => 1

        ]);

        Course::create([
            'name' => '9 Grado',
            'capacity' => 60,
            'school_information_id' => 1

        ]);

        Course::create([
            'name' => '10 Grado',
            'capacity' => 60,
            'school_information_id' => 1

        ]);

        Course::create([
            'name' => '11 Grado',
            'capacity' => 60,
            'school_information_id' => 1

        ]);

        Course::create([
            'name' => '8 Grado',
            'capacity' => 60,
            'school_information_id' => 1
        ]);
    }
}
