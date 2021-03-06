<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(UsersSeeder::class);
         $this->call(CurrencySeeder::class);
         $this->call(EducationTypeSeeder::class);
         $this->call(EmploymentSeeder::class);
         $this->call(ExperienceTypeSeeder::class);
         $this->call(RoleSeeder::class);
    }
}
