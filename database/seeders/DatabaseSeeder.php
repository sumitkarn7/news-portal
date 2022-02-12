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
        $this->call(UserTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
        $this->call(ThemeSeeder::class);
        $this->call(PromotionTableSeeder::class);
        $this->call(SocialTableSeeder::class);
        $this->call(AboutTableSeeder::class);
    }
}
