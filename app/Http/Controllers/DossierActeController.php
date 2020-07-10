<?php

namespace App\Http\Controllers;

use App\Dossier;
use Illuminate\Http\Request;

class DossierActeController extends Controller
{
    public function create($id){
        return view('dossiers.acte.create', ['dossier' => $id ]);
    }
    public function addActeToDossier(Request $request,$id){
        $validatedData = $request->validate([
            'type' => 'nullable',
            'date' => 'nullable|date',
            'delai' => 'nullable',
            'contenu' => 'required',
        ]);
       
        $dossier = Dossier::findOrFail($id);
        $dossier->actes()->create($validatedData);
        return redirect()->route('dossiers.show', ['dossier' => $id]);

        //return view('dossiers.acte.handle', ['dossier' => $id ]);
    }
}
