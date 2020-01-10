<?php


use Illuminate\Database\Seeder;

class CommentairesTableSeeder extends Seeder
{
    public function run(){
        factory(App\Models\Commentaires::class, 50)->create();
    }
}
