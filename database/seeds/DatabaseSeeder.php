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
        $this->call(JeuTableSeeder::class);
        $this->call(CommentairesTableSeeder::class);
        $this->call(TagsTableSeeder::class);
    }
}
