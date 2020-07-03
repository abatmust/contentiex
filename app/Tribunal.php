<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tribunal extends Model
{
    protected $fillable = ['nomination'];

    public function dossiers(){
        return $this->hasMany(Dossier::class);
    }
}
