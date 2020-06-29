<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dossier extends Model
{
    protected $fillable = ['ref', 'encours', 'niveau', 'type','annee', 'tribunal_id', 'observation', 'dossier_id'];
}
