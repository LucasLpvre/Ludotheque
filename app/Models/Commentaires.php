<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commentaires extends Model
{
    protected $table = 'commentaires';
    //$taches = Tache:all();

    function jeu(){
        return $this->belongsTo(Jeux::class);
    }
}
