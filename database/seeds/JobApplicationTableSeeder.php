<?php

use Illuminate\Database\Seeder;

class JobApplicationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\ProjectApplication::class, 30)->create();
    }
}
