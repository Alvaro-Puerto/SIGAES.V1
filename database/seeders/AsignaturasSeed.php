<?php

namespace Database\Seeders;

use App\Models\Matter;
use Illuminate\Database\Seeder;

class AsignaturasSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Matter::create([
            'name' => 'Lengua y Literatura',
            'description' => 'Lengua y Literatura'
            ,'school_information_id' => 1
            ]
        );

        Matter::create([
            'name' => 'Filosofia',
            'description' => 'Filosofia'
            ,'school_information_id' => 1
            ]
        );

        Matter::create([
            'name' => 'Quimica',
            'description' => 'Quimica'
            ,'school_information_id' => 1
            ]
        );

        Matter::create([
            'name' => 'Historia',
            'description' => 'Historia'
            ,'school_information_id' => 1]
        );

        Matter::create([
            'name' => 'Historia',
            'description' => 'Historia'
            ,'school_information_id' => 1
            ]
        );

        Matter::create([
            'name' => 'Educacion Fisica',
            'description' => 'Educacion Fisica'
            ,'school_information_id' => 1
            ]
        );
    }
}
