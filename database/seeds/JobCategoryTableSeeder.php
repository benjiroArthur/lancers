<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JobCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('job_categories')->insert([
            [
                'name' => 'Programming And Tech',
                'description' => 'lorem',
                'cover_image' => 'progtech.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Video And Animation',
                'description' => 'Lorem',
                'cover_image' => 'vidanimate.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Graphic Design',
                'description' => 'Lorem',
                'cover_image' => 'graphicsdes.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Digital marketing',
                'description' => 'Lorem',
                'cover_image' => 'digitalmark.jpg',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
