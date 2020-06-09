<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            [
                'name' => 'admin',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                 'name' => 'client',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                 'name' => 'freelancer',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
