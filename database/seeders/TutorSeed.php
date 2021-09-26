<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class TutorSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $count = 0;
        $faker = Factory::create('es_ES');
        for ($i=0; $i < 500; $i++) { 
                
                $first_name = $faker->firstNameMale;
                $last_name = $faker->firstNameMale;
                $user = User::create([

                    'name' => $first_name . ' ' . $last_name,
                    'email' => $faker->email,
                    'email_verified_at' => now(),
                    'password' => Hash::make('secret'),
                    'first_name' => $first_name,
                    'last_name' => $last_name,
                    'phone' => $faker->phoneNumber,
                    'birth_date' => $faker->date(),
                    'gender' => 'Masculino',
                    'dni' => $faker->numberBetween(11474836,  21474836),
                    'created_at' => now(),
                    'updated_at' => now()
                ]);

                $student = $user->tutor()->create([
                    
                    'general_observation' => 'test'
                ]);
                $count = $count + 1;
                error_log('Tutor configurado ->'. $count);
        }
    }
}
