<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //$this->call(ClientsTableSeeder::class);
        //$this->call(FreelancersTableSeeder::class);
       //$this->call(ProjectsTableSeeder::class);

        //$this->call(ProjectsTableSeeder::class);
        //$this->call(ProjectsTableSeeder::class);
        //$this->call(JobApplicationTableSeeder::class);

        $this->call(JobOfferedTableSeeder::class);
        //$this->call(JobOfferedTableSeeder::class);
        //$this->call(JobOfferedTableSeeder::class);


    }
}
