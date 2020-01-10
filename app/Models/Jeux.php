<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jeux extends Model
{
    protected $table = 'jeux';
    //$taches = Tache:all();

    function commentaires(){
        return $this->hasMany(Commentaires::class);
    }

    function tags(){
        return $this->belongsToMany(Tags::class, 'tag_jeux');
    }
}
