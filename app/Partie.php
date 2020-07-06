<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Partie extends Model
{
    protected $fillable = ['nomination'];
    public function dossiers(){
        return $this->belongsToMany(Partie::class);
    }
}
