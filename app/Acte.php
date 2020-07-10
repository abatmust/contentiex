<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Acte extends Model
{
    protected $fillable = ['type','date','delai','contenu'];
    public function dossier()
    {
        return $this->belongsTo(Dossier::class);
    }
}
