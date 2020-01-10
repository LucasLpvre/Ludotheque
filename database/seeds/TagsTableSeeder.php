<?php


use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    public function run(){
        factory(App\Models\Tags::class, 10)->create();
    }
}
