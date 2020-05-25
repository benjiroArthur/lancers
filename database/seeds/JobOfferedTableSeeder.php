<?php

use Illuminate\Database\Seeder;

class JobOfferedTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\JobOffered::class, 30)->create();
    }
}
