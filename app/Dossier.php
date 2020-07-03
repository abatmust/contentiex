<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dossier extends Model
{
    protected $fillable = ['ref', 'encours', 'niveau', 'type','annee', 'tribunal_id', 'observation', 'dossier_id'];

    public function tribunal(){
        return $this->belongsTo(Tribunal::class);
    }

    // public function dossiers()
    // {
    //     return $this->hasMany(Dossier::class);
    // }
    public function previous()
    {
        return $this->belongsTo('App\Dossier','dossier_id');
    }
    public function parties()
    {
        return $this->belongsToMany(Partie::class);
    }
}
