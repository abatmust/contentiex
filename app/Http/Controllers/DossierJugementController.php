<?php

namespace App\Http\Controllers;

use App\Dossier;
use App\Jugement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DossierJugementController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }
    public function index($id){
        $dossier = Dossier::findOrFail($id);
        return view('dossiers.jugement.index', ['dossier' => $dossier ]);
    }
    public function create($id){
        return view('dossiers.jugement.create', ['dossier' => $id ]);
    }
    public function add(Request $request, $id){
        
        $validatedData = $request->validate([
            'num' => 'nullable',
            'date' => 'nullable|date',
            'delai' => 'nullable',
            'contenu' => 'required',
            'favorable' => 'nullable',
            'montant' => 'numeric|nullable',
            'image' => 'nullable|file',
           
        ]);
        $validatedData['favorable'] = $request->has('favorable') ? 1 : null;
        $dossier = Dossier::findOrFail($id);
        if($request->hasFile('myFile')){
            $path = Storage::disk('public')->putFile('mesImages', $request->file('myFile'));
            $validatedData['image'] = $path;
        }
        $dossier->jugements()->create($validatedData);
        return redirect()->route('dossiers.index');
        
    }
    public function update(Request $request, $id){

     //dd($request->file('myFile'));
        $jugement = Jugement::findOrFail($id);
       
        //dd($request->all());
        $validatedData = $request->validate([
            'num' => 'nullable',
            'date' => 'nullable|date',
            'delai' => 'nullable',
            'contenu' => 'required',
            'favorable' => 'nullable',
            'montant' => 'numeric|nullable',
            'image' => 'nullable|file',
           
        ]);
        $validatedData['favorable'] = $request->has('favorable') ? 1 : null;
        if($request->hasFile('myFile')){
            $path = Storage::disk('public')->putFile('mesImages', $request->file('myFile'));
            $validatedData['image'] = $path;
        }
        $jugement->update($validatedData);
        return redirect()->back();


    }
}
