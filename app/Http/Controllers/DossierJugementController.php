<?php

namespace App\Http\Controllers;

use App\Dossier;
use App\Jugement;
use Illuminate\Http\Request;

class DossierJugementController extends Controller
{
    public function index($id){
        $dossier = Dossier::findOrFail($id);
        return view('dossiers.jugement.index', ['dossier' => $dossier ]);
    }
    public function create($id){
        return view('dossiers.jugement.create', ['dossier' => $id ]);
    }
    public function add(Request $request, $id){
       
        $request->favorable = $request->has('favorable');

        $validatedData = $request->validate([
            'num' => 'nullable',
            'date' => 'nullable|date',
            'delai' => 'nullable',
            'contenu' => 'required',
            'favorable' => 'nullable',
            'montant' => 'numeric|nullable',
            'image' => 'nullable|file',
           
        ]);
       
        $dossier = Dossier::findOrFail($id);
        $dossier->jugements()->create($validatedData);
        return redirect()->route('dossiers.index');
        
    }
    public function update(Request $request, $id){

     
        $jugement = Jugement::findOrFail($id);
        $validatedData = $request->validate([
            'num' => 'nullable',
            'date' => 'nullable|date',
            'delai' => 'nullable',
            'contenu' => 'required',
            'favorable' => 'nullable',
            'montant' => 'numeric|nullable',
            'image' => 'nullable|file',
           
        ]);

       
        $jugement->update($validatedData);
        return redirect()->back();


    }
}
