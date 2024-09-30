<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Employee;
use App\Models\Company;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 30; $i++) { // Creating 30 employees
            Employee::create([
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'company_id' => Company::inRandomOrder()->first()->id, // Assign a random company
                'email' => $faker->email,
                'phone' => $faker->phoneNumber,
            ]);
        }
    }
}
