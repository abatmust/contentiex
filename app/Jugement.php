<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jugement extends Model
{
    protected $fillable = ['num', 'date', 'contenu', 'favorable','montant', 'image'];
    public function dossier(){
        return $this->belongsTo(Dossier::class);
    }
}
