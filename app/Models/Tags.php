<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    protected $table = 'tags';
    //$taches = Tache:all();

    function jeu(){
        return $this->belongsToMany(Jeux::class);
    }
}
