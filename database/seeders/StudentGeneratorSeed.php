<?php

namespace Database\Seeders;

use App\Models\Student;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class StudentGeneratorSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Factory::create();
        for ($i=0; $i < 20; $i++) { 
                
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
                    'created_at' => now(),
                    'updated_at' => now()
                ]);

                $student = $user->student()->create([
                    'code' => rand(1000000, 4000000),
                    'general_observation' => 'test'
                ]);
        }
    }
}
