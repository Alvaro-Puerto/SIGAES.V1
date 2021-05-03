<?php
namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@localhost.com',
            'email_verified_at' => now(),
            'password' => Hash::make('secret'),
            'first_name' => $faker->firstNameMale,
            'last_name' => $faker->lastName,
            'phone' => $faker->phoneNumber,
            'birth_date' => $faker->date(),
            'gender' => 'Masculino',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
