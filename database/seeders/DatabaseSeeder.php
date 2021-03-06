<?php

namespace Database\Seeders;

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
        // \App\Models\User::factory(10)->create();
        \App\Models\FoodCategories::factory(6)->create();
        \App\Models\Recipe::factory(9)->create();
        \App\Models\Ingredient::factory(20)->create();
    }
}
