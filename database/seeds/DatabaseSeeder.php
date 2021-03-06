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
         $this->call(UsersSeeder::class);
         $this->call(ProjectsSeeder::class);
         $this->call(ProfileExtentionsSeeder::class);
         $this->call(AppliesSeeder::class);
    }
}
