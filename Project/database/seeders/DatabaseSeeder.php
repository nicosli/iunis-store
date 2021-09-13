<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        /** 
         * Add the first user
         */
        DB::table('users')->insert([
            'name'     => 'Nicolas Navarrete Clemente',
            'email'    => 'nicolas.navarrete@iunis.edu.mx',
            'password' => bcrypt('ok00'),
            'current_team_id' => 1
        ]);
        DB::table('teams')->insert([
            'user_id'  => 1,
            'name'    => 'Shoes Store',
            'personal_team' => 1
        ]);

    }
}
