<?php


use Illuminate\Database\Seeder;

class JeuTableSeeder extends Seeder
{
    public function run(){
        factory(App\Models\Jeux::class, 20)->create();
    }
}
