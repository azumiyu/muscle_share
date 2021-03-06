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
         $this->call(UsersTableSeeder::class);
         $this->call(CategoriesTableSeeder::class);
         $this->call(WorkoutsTableSeeder::class);
         $this->call(CommunitiesTableSeeder::class);
         $this->call(PostsTableSeeder::class);
         $this->call(PersonalsTableSeeder::class);
    }
}
