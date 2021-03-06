<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Products;
use App\Models\Variants;
use App\Models\Categories;
use App\Models\Providers;

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

        /**
         * Add Categories
         */
        DB::table('categories')->insert([
            'name'    => 'Shoes',
            'description' => 'Shoes description',
            'created_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('categories')->insert([
            'name'    => 'Hats',
            'description' => 'Hats description',
            'created_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('categories')->insert([
            'name'    => 'Tables',
            'description' => 'Tables description',
            'created_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('categories')->insert([
            'name'    => 'Accessories',
            'description' => 'Accessories description',
            'created_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('categories')->insert([
            'name'    => 'Clothing',
            'description' => 'Clothing description',
            'created_at' => date('Y-m-d H:i:s')
        ]);

        /**
         * Add products
         * With relationship to Providers
         */
        Products::factory()
            ->has(Providers::factory()->count(1))
            ->count(150)
            ->create();

        /**
         * Add variants
         */
        Variants::factory()->count(500)->create();

    }
}
