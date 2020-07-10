<?php

namespace App\Http\Controllers;

use App\Acte;
use Illuminate\Http\Request;

class ActeController extends Controller
{
    public function destroy($id){
        $acte = Acte::findOrFail($id);
        $acte->delete();
        return redirect()->back();
    }
    public function edit($id){
        $acte = Acte::findOrFail($id);

        return view('dossiers.acte.edit')->with(['acte' => $acte]);
    }
    public function update(Request $request, $id){
        $validatedData = $request->validate([
            'type' => 'nullable',
            'date' => 'nullable|date',
            'delai' => 'nullable',
            'contenu' => 'required',
        ]);
        $acte = Acte::findOrFail($id);
        $acte->update($validatedData);

        return view('dossiers.show')->with(['dossier' => $acte->dossier]);
    }
}
